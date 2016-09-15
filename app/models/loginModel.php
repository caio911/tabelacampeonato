<?php
	
	Class loginModel extends Model{


		public function logar($nome, $senha){

			return $this->iniciaSessao($nome, $senha);

		}
		
	}
 ?>