<?php
	
	Class Config{

	
		public $server = 'localhost';
		public $db_name = 'cartola';
		public $user_name = 'root';
		public $pass = '';
		public $_urlSite = 'http://localhost/my_files/api/app/';


		public function getServer(){
			return $this->server;
		}

		public function getDataBase(){
			return $this->db_name;
		}

		public function getUserDataBase(){
			return $this->user_name;
		}

		public function getPassDataBase(){
			return $this->pass;
		}

	}




 ?>