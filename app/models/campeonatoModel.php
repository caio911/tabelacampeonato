<?php
	
	Class campeonatoModel extends Model{

		public function iniciar($dados, $tabela){
			$dados_tabelas = $this->update($dados, null, $tabela);
		}

	}
 ?>