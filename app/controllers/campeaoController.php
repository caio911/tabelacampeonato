<?php
	
	Class campeao extends Controller{

		public function index_action(){

			$times = new eliminatoriaModel;
			$dados_cad['times'] = $times->campeao('campeao');

			$this->view('campeao', $dados_cad);

			
		}

	}

 ?>