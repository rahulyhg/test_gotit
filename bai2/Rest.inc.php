<?php
	/* File : Rest.inc.php
	*/
	class REST {
		
		public $_allow = array();
		public $_content_type = "application/json";
		public $_request = array();	
		private $_code = 200;
		
		public function __construct(){
			$this->inputs();
		}
		
		public function response($data,$status){
			$this->_code = ($status)?$status:200;
			$this->set_headers();
			echo $data;
			exit;
		}
		
		private function get_status_message(){
			$status = array(
						200 => 'OK',
						400 => 'Bad Request',
						401 => 'Unauthorized',
						403 => 'Forbidden',
						404 => 'Not Found',
						406 => 'Not Acceptable',
						500 => 'Internal Server Error1');
			return ($status[$this->_code])?$status[$this->_code]:$status[500];
		}
		
		public function get_request_method(){
			return $_SERVER['REQUEST_METHOD'];
		}
		
		private function inputs(){
			switch($this->get_request_method()){
				case "POST":
					$this->_request = $this->cleanInputs($_POST);
					break;
				case "GET":
					$this->_request = $this->cleanInputs($_GET);
					break;
				case "DELETE":
					break;
				case "PUT":
					break;
				default:
					$this->response('',406);
					break;
			}
		}		
		
		private function cleanInputs($data){
			$clean_input = array();
			if(is_array($data)){
				foreach($data as $k => $v){
					$clean_input[$k] = $this->cleanInputs($v);
				}
			}else{
				if(get_magic_quotes_gpc()){
					$data = trim(stripslashes($data));
				}
				$data = strip_tags($data);
				$clean_input = trim($data);
			}
			return $clean_input;
		}		
		
		private function set_headers(){
			header("HTTP/1.1 ".$this->_code." ".$this->get_status_message());
			header("Content-Type:".$this->_content_type);
		}
	}	
?>