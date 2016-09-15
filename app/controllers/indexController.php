<?php
	
	Class Index extends Controller{

		public function index_action(){

			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados_cad['logado'] = true;
			}
			
			$times = new eliminatoriaModel;
			$dados_cad['times'] = $times->timesFase1('fase1');

			$this->view('eliminatoria', $dados_cad);

			
		}

	}

 ?>