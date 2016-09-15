<?php
	
	Class logout extends Controller{

		public function index_action(){

			$model =  new logoutModel;
			$model->sair();

			header('location:/');
			exit;
			
		}

	}

 ?>