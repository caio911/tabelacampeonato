<?php
	
	Class novocampeonato extends Controller{

		public function index_action(){

			$model = new Model;
			if ( $model->verificaSessao()) {
				$numero_participantes['logado'] = true;
				$numero_participantes['participantes'] = $model->rowCountDb();
				$this->view('novocampeonato', $numero_participantes);
			}else{
				header('location:/');
			}

		}

		public function iniciar(){
			// LIMPA OS CAMPOS DAS TABELAS E FAZ UM TRUNCATE NAS TABELAS fase1 E usuarios
			$model = new Model;
			if ( $model->verificaSessao()) {
					$senha = '@@aposenta!!190';
					$senha_post = $_POST['field_senha'];
					$model= new Model;
					$model->antiInjection($senha_post);

					$numero_participantes = $model->rowCountDb();

					if($numero_participantes > 0){
						if(trim($senha_post) == $senha){

						$tabela = "fase4 as f4 inner join fase3 as f3 inner join fase2 as f2";
						$dados = array(
								"f4.id_time_a" => "",
								"f4.id_time_b" => "",
								"f4.ponto_a" => "",
								"f4.ponto_b" => "",
								"f3.id_time_a" => "",
								"f3.id_time_b" => "",
								"f3.ponto_a" => "",
								"f3.ponto_b" => "",
								"f2.id_time_a" => "",
								"f2.id_time_b" => "",
								"f2.ponto_a" => "",
								"f2.ponto_b" => ""
						);

						$model->trucatetabela('fase1');
						//$model->trucatetabela('usuarios');

						$novocampeonato = new campeonatoModel;
						$novocampeonato->iniciar($dados, $tabela);

						$this->view('cadastro');
						
					}else{
						$retorno = array (
								'result' => 'error',
								'msg' => 'Senha incorreta!'
						);
						echo json_encode($retorno);
					}
				}else{
					$this->view('novocampeonato');
				}
			}else{
				header('location:/');
			}

		}

	}
 ?>