<?php
require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;

$response =  new MessagingResponse();
$guess = $_REQUEST['Body'];
$pick = rand(1,5);

if (in_array($guess, ['gender breakdown'])) {
   $response->message('sexUpdate');
} elseif (in_array($guess, ['provinces'])) {
   $response->message("CasesProvince");

} elseif (in_array($guess, ['update summary'])) {
   $response->message("UpdateSummary");

} elseif (in_array($guess, ['positive cases'])) {
   $response->message("apicase");


} elseif (in_array($guess, ['daily stats'])) {
   $response->message("apiday");


} elseif (in_array($guess, ['dateUpdate'])) {
   $response->message("dateUpdate");






} else {
   $response->message("Correct information is critical. This service provides the official and up to date information on the status of COVID-19 in Zimbabwe from the Open Parly
   Reply with one of the words in the list below to get the correct information on the topic:  
   gender breakdown
   provinces
   update summary
   positive cases
   daily stats
   dateUpdate
   Share this service ➡️");
}

print $response;

//fetch data from openparly api
function requestDataAPI($url){
   $api = 'https://crnzwhack.herokuapp.com';
   $request_url = $api. '/' . $url;
   $response = json_decode(file_get_contents($request_url));
   return $response;
}

//make data from openparly api readable
function DecodeDataAPI($jsonobj){}

//shortList for counselling
function allocateCounsellor($counselorRequest){
   $serverName = "db4free.net:3306";
   $username = "nyaradzo";
   $password = "defaultnyaradzopassword";
   $dbname = "nyaradzo";
   $waNumber = getenv('MY_WHATSAPP_NUMBER');
   $chatID = rand(8000,324094230);
   $conn = new mysqli($serverName, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "INSERT INTO todos(phone,chatID)
   VALUES ($waNumber, $chatID)";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
   return $chatID;
}

