<?php
	
	Class Model extends System{

		protected $db;
		public $_tabela;
		private $users; 
		
	    public function __construct(){

            $this->hostname = $this->getServer();
            $this->dbname = $this->getDataBase();
            $this->username = $this->getUserDataBase();
            $this->pw = $this->getPassDataBase();
            $this->ConectarBanco();
               
        }


        public function ConectarBanco(){  

            try {
                $this->db = new PDO("mysql:host=$this->hostname;charset=UTF8;dbname=$this->dbname","$this->username","$this->pw",
				                	array(
						                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
						                PDO::ATTR_PERSISTENT => false,
						                PDO::ATTR_EMULATE_PREPARES => false,
						                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
						               )
				                	);
            } catch (PDOException $e) {
                echo "Falha ao se conectar: " . $e->getMessage() . "\n";
                exit;
            }
     
		}


		public function verificaUsuario(ARRAY $dados){

			$slug = $dados['slug'];

			$stmt = $this->db->prepare("SELECT * FROM $this->_tabela WHERE slug = '{$slug}' ");

            $stmt->execute();

            return $stmt->rowCount();

		}

		public function rowCountDb(){

			$stmt = $this->db->prepare("SELECT count(id) FROM `usuarios` ");

            $stmt->execute();

            return $stmt->fetchColumn();
		}

		public function insert(ARRAY $dados){

			$campos = implode(',', array_keys($dados));

			$valores = "'".implode("','", array_values($dados))."'";

			try{
                        
                $stmt = $this->db->prepare("INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores}) ");


                if($this->verificaUsuario($dados) == 0){
                	$stmt->execute();
                	$retorno = array (
                			'numero_participantes' => $this->rowCountDb(),
                			'nome' => $dados['nome'],
                			'nome_cartola' => $dados['nome_cartola'],
							'result' => 'success',
							'msg' => 'Cadastrado com sucesso!'
						);


                }else{
                	$retorno = array (
							'result' => 'error',
							'msg' => 'Time já cadastrado!'
						);
                }
                
            }catch(PDOException $e){

                    die("Erro ao cadastrar".$e->getMessage());

            }

            echo json_encode($retorno);
            			
		}

		

		public function read($where = null, $limit = null, $offset = null, $order = null){
				   
			$where = $where != null ? "WHERE {$where}" : "";

			$limit = $limit != null ? "LIMIT {$limit}" : "";

			$offset = $offset != null ? "OFFSET {$offset}" : "";

			$order = $order != null ? "ORDER BY {$order}" : "";

			$stmt = $this->db->prepare("SELECT * FROM `{$this->_tabela}` {$where} {$order} {$limit} {$offset}");

			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}

		public function update(Array $dados, $where = null, $tabela){
   
			$where = $where != null ? "WHERE {$where}" : "";

			foreach ($dados as $inds => $vals) {

				$campos[] = "{$inds} = '{$vals}'";
			}

			$campos = implode(', ', $campos);

				$stmt =  $this->db->prepare("UPDATE {$tabela} SET {$campos} {$where} ");

				$stmt->execute();

				if($stmt->rowCount() ==  0){
     				$retorno = array (
							'result' => 'error',
							'msg' => 'Não foi possivel atualizar',
						);

		 		}else{
			  
             		$retorno = array (
							'result' => 'success',
							'msg' => 'Atualizado com sucesso!'
						);


		 		}
		 	echo json_encode($retorno);
		}

		public function delete($where = null){

			$id_user=$id;
			
			$stmt = $this->db->prepare("DELETE FROM `{$this->_tabela}` WHERE {$where} ");
			$stmt->execute();

			if($stmt->rowCount() ==0){
	    		$retorno = array (
							'result' => 'error',
							'msg' => 'usuario já Excluido!',
						);
	    	}else{
	    		$retorno = array (
							'result' => 'success',
							'msg' => 'Excluido com sucesso!'
						);
			}

			echo json_encode($retorno);

		}

		function trucatetabela($tabela){
			$stmt =  $this->db->prepare("TRUNCATE {$tabela}");
			$stmt->execute();
			if($stmt->rowCount() ==  0){
     				$retorno = array (
						'result' => 'error',
						'msg' => 'Não foi possivel atualizar',
					);

		 		}else{
			  
             		$retorno = array (
						'result' => 'success',
						'msg' => 'Atualizado com sucesso!'
					);


		 		}
		 	echo json_encode($retorno);
		}

		function antiInjection($value){
    	
			$badsql  = "convert|sleep|delay|union|concat|from|select|insert|delete|where|truncate table|drop table|show tables|#|*|--|";
			$array = explode("|", $badsql);
			foreach ($array as $sql) {
				$value = str_replace($sql,"", strtolower($value));
		    }
		    $value = strip_tags($value);//tira tags html e php
		    $value = addslashes($value);//Adiciona barras invertidas a uma string

		    return $value;

	    }




	    /************************SESSION E LOGIN***************************/


	    public function iniciaSessao($senha, $usuario){


	    	if($senha == '@@aposenta!!@@190' && $usuario == 'admin'){


				session_start();
				$_SESSION['nome'] = $usuario;
				$_SESSION['senha'] = $senha;



				if($_SESSION['nome'] != null && $_SESSION['senha'] != null){
					$retorno = array (
							'result' => 'success'
						);
					
				}else{
					$retorno = array (
							'result' => 'error',
							'msg' => 'Não foi possível criar a sessão!'
						);
				}
				

	    	}else{
	    		$retorno = array (
							'result' => 'error',
							'msg' => 'Usuario ou senha não se correspondem!'
						);
	    	}

	    	echo json_encode($retorno);
	    }
	    
	    function verificaSessao(){

	    	// TEMPO DA SESSÃO
	    	$this->fechaSessao(1000);
	    	
			if(isset($_SESSION['nome']) and isset($_SESSION['senha']) ) { 
				return true;
			}else{
				return false;
			}
	    }


		function fechaSessao($value){
			$expira_tempo = $value;
 
			if(isset($_SESSION['sessao_verficacao'])){
			  
			    $segundos_ativo = time() - $_SESSION['sessao_verficacao'];
			    
			    $expira_tempo_secondos = $expira_tempo * 60;
			    
			    if($segundos_ativo >= $expira_tempo_secondos){
			        session_unset();
			        session_destroy();
			    	unset($_SESSION['nome']);
			    	unset($_SESSION['senha']);
			    }
			  
			}

			$_SESSION['sessao_verficacao'] = time();
		}


	    public function encerraSessao(){

	    	session_destroy();
	    	unset($_SESSION['nome']);
	    	unset($_SESSION['senha']);
	    }










	}

 ?>