<?php

	Class Cadastro extends Controller{

		public function index_action(){
			$model = new Model;

			if ( $model->verificaSessao()) {
				$data['logado'] = true;
				$todos_usuario = new cadastroModel;
				$data['dados'] = $todos_usuario->Usuario();
				$data['numero_times'] = $todos_usuario->NumeroTime();
				$this->view('cadastro', $data);
			}else{
				header('location:/');
			}
		
		}

		public function cadastrar(){

			$cad = new cadastroModel;
			$model = new Model;
			$erro = 0;
			$nome_time = $_POST['field_time'];
			$nome_time = str_replace(array('`','´'),'', $nome_time);
			$nome_time = str_replace(array(' ', '.','_'),'-',$nome_time);

			if(empty($nome_time)){
				$msg .= 'Digite o nome do time!';
				$erro++;
			}else{
				$nome_time_pesquisa = 'https://api.cartolafc.globo.com/time/'.strtolower($nome_time);
				$response = file_get_contents($nome_time_pesquisa);
				$data = json_decode($response);
			}
			
			$dados = array(
				"time_id" =>  $model->antiInjection($data->time->time_id),
				"foto_perfil" =>  $model->antiInjection($data->time->foto_perfil),
				"nome" =>  $model->antiInjection($data->time->nome),
				"nome_cartola" =>  $data->time->nome_cartola,
				"slug" =>  $model->antiInjection($data->time->slug),
				"url_escudo_svg" =>  $model->antiInjection($data->time->slug)
			);
			if($erro ==0){
				if(strlen($data->time->time_id) > 0){
					
					$file=$data->time->url_escudo_svg;
					$newfile = '/app/views/files/images/'.$data->time->slug.'.svg';

					if (!copy($file, $newfile)) {
					    echo "failed to copy";
					}else{
						echo 'ok';
					}
					$cad->inserir($dados);
				}else{
					$retorno = array (
						'result' => 'error',
						'msg' => 'Digite um time valido'
					);
					echo json_encode($retorno);
				}
				
			}else{
				$retorno = array (
					'result' => 'error',
					'msg' => $msg
				);

				echo json_encode($retorno);
			}

		}

		public function excluir(){

			$exc = new cadastroModel;
			$model = new Model; 
			$id_time = $_POST['field_excluir'];
		
			if($model->verificaSessao()){
				if(is_numeric($id_time)){
					$exc->excluirUsuario($id_time);
				}
			}

		}

	}

 ?>