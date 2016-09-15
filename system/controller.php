<?php
	

	// EXTENDS SYSTEM PARA TER O CONTROLE DA FUNÇÃO GETPARAMS
	Class Controller extends System{


		protected function view($nome, $vars = null){

			// USANDO EXTRACT PARA PEGAR O VALOR DE UMA VARIAVEL E ADD UM VALOR A ELA PARA NAO SE REPETIR E TRANFORMANDO EM UMA VARIAVEL
			// NO CASO AQUI ADD VIEW echo view_variavel
			if(is_array($vars) && count($vars) > 0){
				extract($vars, EXTR_PREFIX_ALL, 'view');
			}
			
			$_urlSite = $this->_urlSite;

			include INCLUDES.'header.php';
			include INCLUDES.'menu.php';

			require_once( VIEW . $nome . '.php');

			include INCLUDES.'footer.php';
		}
		
	}

 ?>