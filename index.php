<?php
$accessToken = "EAAEVNPZCAnNgBAPwJVHVi1D5v9HIygF5jLeGJ1gVLOobW1J75Jke8KlJndgYJV3NqJqIR363kQwulRp1iacI5qVEwKzVmf8F5INYrvZBWIERrtAKK6qL2V18tKvPBREYchK2TMZApCZAtukB2ML1ZC3llWMBq41aFNksfHBxLqQZDZD";

if(isset($_REQUEST['hub_challenge'])) {
  $challenge = $_REQUEST['hub_challenge'];
   $token = $_REQUEST['hub_verify_token'];
}
 //echo $challenge;
if($token == "MyCustomToken123") {
  echo $challenge;
}

$input = json_decode(file_get_contents('php://input'), true);
$userID = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];

$url = "https://graph.facebook.com/v2.6/me/messages?access_token=$accessToken";
$jsonDate = "{
  'recipient': {
    'id': $userID
  },
  'message': {
    'text':'welcome!'
  }
  }";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDate);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])){
curl_exec($ch);

}



?>
