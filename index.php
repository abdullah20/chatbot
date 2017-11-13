<?php
if(isset($_REQUEST['hub_challenge'])) {
  $challenge = $_REQUEST['hub_challenge'];
   $token = $_REQUEST['hub_verfiy_token'];
}

if($token == "token123") {
  echo $challenge;
}
