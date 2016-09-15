<?php
	
	Class cadastroModel extends Model{

		public $_tabela = 'usuarios';

		public function inserir($dados){

			$this->insert($dados);

		}

		public function url_exists($url) {

		    $ch = curl_init($url);
		    curl_setopt($ch, CURLOPT_NOBODY, true);
		    curl_exec($ch);
		    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		    curl_close($ch);

		   if($code!=200){
		   		return false;
		   	}else{
		   		return true;
		   	}
		   
		}

		public function Usuario(){

			$stmt = $this->db->prepare("SELECT id, nome, nome_cartola, slug FROM `usuarios` ORDER BY id ASC");

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function NumeroTime(){
			return $this->rowCountDb();
		}


		public function excluirUsuario($id_user){
			$this->delete('id='.$id_user);
		}


	}
 ?>