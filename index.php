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
$jsonDate = "{
  'recipient': {
    'id': $userID
  },
  'message': {
    'text':'$rep'
  }
  }";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDate);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])){
  for($i = 0; $i <= 3; $i = 1)
{ switch ($i) { 
    case '0': 
    $rep='welcome';
    curl_exec($ch);
    if(!empty($input['entry'][0]['messaging'][0]['message'])) {break;}
    case '1':
    $rep='which city do you live?';
    curl_exec($ch);
    if(!empty($input['entry'][0]['messaging'][0]['message'])) {break;}
    case '2':
     $rep='what subject you need help with?';
    curl_exec($ch);
    if(!empty($input['entry'][0]['messaging'][0]['message'])) {break;}
    case '3':
     $rep='we will search for a teacher to help you soon';
    if(!empty($input['entry'][0]['messaging'][0]['message'])) {break;}
}

}

?>
