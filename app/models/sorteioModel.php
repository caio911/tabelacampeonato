<?php
	
	Class sorteioModel extends Model{

		public $_tabela = 'fase1';

		public function sortear($dados){

			$campos = implode(',', array_keys($dados));

			$valores = "'".implode("','", array_values($dados))."'";

			if($this->NumeroTime() < 33 ){
				$stmt = $this->db->prepare("INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores}) ");
          		$stmt->execute();
			}
            
            
		}

		public function NumeroTime(){
			return $this->rowCountDb();
		}
	}
 ?>