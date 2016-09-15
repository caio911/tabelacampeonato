<?php
	
	Class System extends Config{

		private $_url;
		private $_explode;
		public $_controller;
		public $_action;
		public $_params;
		public $_siteIndex = 'http://localhost/my_files/api/';


		public function __construct(){

			$this->setUrl();
			$this->setExplode();
			$this->setController();
			$this->setAction();
			$this->setParams();
		}

		private function setUrl(){
			$_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'index/index_action');
			$this->_url = $_GET['url'];
		}

		private function setExplode(){
			$this->_explode = explode('/', $this->_url);
		}

		public function setController(){

			$this->_controller = $this->_explode[0];
		}

		private function setAction(){

			$ac = (!isset($this->_explode[1]) || $this->_explode[1] == null || $this->_explode[1] == 'index' ? 'index_action' : $this->_explode[1]);
			$this->_action = $ac;
		}

		private function setParams(){

			unset($this->_explode[0], $this->_explode[1]); 

			if( end($this->_explode) == null){
				array_pop($this->_explode);
			}
			
			$i = 0;

			if(!empty($this->_explode)){
 
				foreach($this->_explode as $vals){

					if($i % 2 == 0){
						$inds[] = $vals;
					}else{
						$values[] = $vals;
					}
					$i++;
					
				}

			}else{

				$inds = array();
				$vals = array();
			}

			if(count($inds) == count($values) && !empty($inds) && !empty($values)){

				$this->_params = array_combine($inds, $values);

			}else{
				$this->_params =  array();
			}
			
		}

		public function getParams($name = null){
			
			if($name != null)
				return $this->_params[$name];
			else
				return $this->_params;
		}	

		public function run(){

			$controller_path = CONTROLLER . $this->_controller. 'Controller.php';

			if(!file_exists($controller_path)){
				die('O Controller não existe');
				//header('location:http://seaposenta.esy.es/');
			}

			require_once( $controller_path );
			$app = new $this->_controller();

			if(!method_exists($app, $this->_action)){
				die('A action não existe');
				//header('location:http://seaposenta.esy.es/');
			}

			$action = $this->_action;
			$app->$action();
		}


		//header('Location: http://localhost/my_files/api/');
		//exit;
	}

 ?>