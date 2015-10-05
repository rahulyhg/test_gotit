<?php
	require_once("Rest.inc.php");
	require_once("Utils.php");
	require_once("Db.php");


	Class Questions extends REST{

		public function __construct(){
			parent::__construct();// Init parent contructor
			$this->ultis = new Utils();
		}

		public function subject(){
			$db = new DB();

			$id = $this->_request['id'];
			$header = $this->ultis->request_headers();
			//check _Authenticated key
			if( isset($header['WWW-AUTHENTICATE']) ){
				$authen_key = $header['WWW-AUTHENTICATE'];
			}else{
				$this->response("", 401);
			}
			//if not
			//deffault token: 633uq4t0qdtd1mdllnv2h1vs32
			if($authen_key !="633uq4t0qdtd1mdllnv2h1vs32"){
				$this->response("", 403);
			}else{
				$_userid = $this->ultis->getUserIdFromToken($authen_key);
				$sql = "SELECT * FROM questions WHERE _uid = '$_userid' AND _subject = '$id' ORDER BY `questions`.`_created` DESC LIMIT 0,20";
				$rs = $db->query($sql);
				if($rs->num_rows > 0){
						$result = $db->select($sql);
						$this->response($this->ultis->json($result), 200);
					}
			}
		}

	}

	$ultis = new Utils();
	$questions = new Questions();
	$ultis->router($questions);

?>