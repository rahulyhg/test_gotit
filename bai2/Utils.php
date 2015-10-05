<?php
  require_once("Rest.inc.php");
  Class Utils extends REST{

    public function __construct(){
      parent::__construct();
    }

    /*
     *  Encode array into JSON
    */
    function json($data){
      if(is_array($data)){
        return json_encode($data);
      }
    }
    /*
    *Router
    */
    public function router($obj){
      $func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
      if((int)method_exists($obj,$func) > 0)
        $obj->$func();
      else
        $obj->response('',404);        // If the method not exist with in this $obj, response would be "Page not found".
    }

    function request_headers() {
      $arh = array();
      $rx_http = '/\AHTTP_/';
      foreach($_SERVER as $key => $val) {
        if( preg_match($rx_http, $key) ) {
          $arh_key = preg_replace($rx_http, '', $key);
          $rx_matches = array();
          // do string manipulations to restore the original letter case
          $rx_matches = explode('_', $arh_key);
          if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
            foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
            $arh_key = implode('-', $rx_matches);
          }
          $arh[$arh_key] = $val;
        }
      }
      return( $arh );
    }

    function getUserIdFromToken($token="633uq4t0qdtd1mdllnv2h1vs32"){
      //return default id
      return 1;
    }

  }
?>