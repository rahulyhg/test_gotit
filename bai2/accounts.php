<?php
	require_once("Rest.inc.php");
	require_once("Utils.php");
	require_once("Db.php");


	Class Accounts extends REST{

		public function __construct(){
			parent::__construct();// Init parent contructor
		}

		public function signin(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$email = $this->_request['email'];
			$password = $this->_request['pwd'];
			$db = new DB();
			$ultis = new Utils();
			// Input validations
			if(!empty($email) and !empty($password)){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$sql = "SELECT _uid, _email FROM users WHERE _email = '$email' AND _password = '".md5($password)."' LIMIT 1";
					$rs = $db->query($sql);
					if($rs->num_rows > 0){
						// If success everythig is good send header as "OK" and user details
						$result = $rs->fetch_array(MYSQLI_NUM);
						$this->response($ultis->json($result), 200);
					}
					$this->response('No Content', 200);	// If no records "No Content" status
				}
			}

			// If invalid inputs "Bad Request" status message and reason
			$error = array('status' => "Failed", "msg" => "Invalid Email address or Password");
			$this->response($ultis->json($error), 400);
		}

	}

	$ultis = new Utils();
	$user = new Accounts();
	$header = $ultis->request_headers();
	var_dump($header);die;
	$ultis->router($user);

?>