<?php
	
	Class logoutModel extends Model{

		public function sair(){

			return $this->encerraSessao();

		}

	}
 ?>