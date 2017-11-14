<?php
$accessToken = "EAAEVNPZCAnNgBAIiHm9XkbCEiKZAGxgCJZA78PaKBYIaCP6L4fxAZBGwS5HeodGy8ztWhkyJlYIBZAkOlMYQ083MIlZByHZBNZCZA5WzQNldTgYwZAODnPsU8FaokjL0iq6rOYK2sZAoWDltAZArjzdGfNxLj3tHNRMOl47VBgDOc5Wl5gZDZD";

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


  
  $rep="welcome";
     
$jsonDate = "{
  'recipient': {
    'id': $userID
  },
  'message': {
    'text': '"$rep"'
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
