<?php
	
	Class Login extends Controller{

		public function index_action(){

			$model = new Model;

			if ( $model->verificaSessao() == true) {
				header('location:index');
			}else{
				$this->view('login', $dados_logado);
			}
		}

		public function logar(){

			$model = new loginModel;
			$nome = $_POST['field_usuario'];
			$senha = $_POST['field_senha'];

			if(empty($nome) || empty($nome)){
				$retorno = array (
							'result' => 'error',
							'msg' => 'Digite o usuario e senha!'
						);
				echo json_encode($retorno);

			}else{

				$usuario = $model->antiInjection($nome);
				$senha = $model->antiInjection($senha);

				$model->iniciaSessao($senha, $usuario);
				
			}
 
		}
		
	}

?>