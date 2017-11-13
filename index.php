<?php
if(isset($_REQUEST['hub_challenge'])) {
  $challenge = $_REQUEST['hub_challenge'];
   $token = $_REQUEST['hub_verify_token'];
}
 //echo $challenge;
if($token == "MyCustomToken123") {
  echo $challenge;
}

$input = file_get_contents('php://input');
var_dump($input);
?>
