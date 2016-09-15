<?php
	
	Class Sortear extends Controller{

		public function index_action(){

			$model = new Model;
			if ( $model->verificaSessao()) {
				$data['logado'] = true;
				$this->view('sorteio',$data);
			}else{
				header('location:/');
			}
		
		}

		public function sorteio(){
			$model = new Model;
			if ( $model->verificaSessao()) {
				$sorteio_mod = new sorteioModel;

				if($sorteio_mod->NumeroTime() == 32){
					$senha = '@@aposenta!!190';
					$senha_post = $_POST['field_senha'];

					$model->antiInjection($senha_post);

					if($senha_post == $senha){


						// PEGA TODOS OS USUARIOS CADASTRO
						$sorteio_times = new cadastroModel;
						$times_sorteio = $sorteio_times->Usuario();

						// FAZ COM QUE OS USUARIOS SEJAM ALEATORIOS
						shuffle($times_sorteio);

						// DIVIDE OS USUARIO COM ID IMPAR E PAR
						$items_par = array();
						$items_impar = array();


						// PERCORRE POR TODOS OS USUARIO
						foreach ($times_sorteio as $key => $value) {
							// $this->sorteio($value[0],$value[1]);

							// VERIFICA SE O USUARIO É PAR E INSERE NO ARRAY PAR SE NAO FOR PAR IRA INSERIR NO ARRAY IMPAR
							if($key % 2 == 0){
								array_push($items_par, array($value['nome'], $value['id'],$value['slug']) );
							}else{
								array_push($items_impar, array($value['nome'], $value['id'], $value['slug']) );
							}
							
						}

						// FAZ UM LOOP CONTANDO QUANTOS USUARIOS PAR TEM E ASSIM GRAVA NA VARIAVEL DADOS PARA INSERIR NO BANCO DE DADOS
						for ($i=0; $i < count($items_par); $i++) { 

							//echo $items_par[$i][0].','.$items_par[$i][1].' X '.$items_impar[$i][0].','.$items_par[$i][1];
							$dados = array(
								"id_jogo" =>  'jogo_'.$i,
								"id_time_a" =>  $items_par[$i][1],
								"ponto_a" =>  0,
								"id_time_b" =>  $items_impar[$i][1],
								"ponto_b" =>  0
							);

							$sorteio_mod->sortear($dados);
						}

						$retorno = array (
							'result' => 'error',
							'msg' => 'Sorteio realizado com sucesso'
						);

						echo json_encode($retorno);
						
					}else{
						$retorno = array (
							'result' => 'error',
							'msg' => 'Senha incorreta'
						);

						echo json_encode($retorno);
						
					}
				}else{
					$retorno = array (
							'result' => 'error',
							'msg' => 'Numero de cartoleiros incorreto!<br> Deve ter 32 cartoleiros para sortear!'
						);

					echo json_encode($retorno);
				}
			
			}else{
				header('location:/');
			}
		}


	}

 ?>