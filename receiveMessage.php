<?php
require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;

$response =  new MessagingResponse();
$msg = $_REQUEST['Body'];


switch ($msg) {
   case 1:
       $response->message(requestDataAPI($uri));
       break;
   case 2:
       $response->message(requestDataAPI($uri));
       break;
   case 3:
       $response->message(requestDataAPI($uri));
       break;
   case 4:
       $response->message(requestDataAPI($uri));
       break;
   case 5:
       $response->message(requestDataAPI('sexUpdate'));
       break;
   case 6:
       $response->message(requestDataAPI('CasesProvince'));
       break;
   case 7:
       $response->message(requestDataAPI('UpdateSummary'));
       break;
   case 8:
       $response->message(requestDataAPI('apicase'));
       break;
   case 9:
       $response->message(requestDataAPI('apiday'));
       break;
   case 10:
         $response->message(requestDataAPI($uri));
         break;
   case 11:
       $response->message(requestDataAPI('transmissionUpdate'));
       break;
  
   default:
   $response->message("Correct information is critical. This service provides the official and up to date information on the status of COVID-19 in Zimbabwe from the OpenParly.
   \nReply with one of the numbers corresponding to a topic in the list below to get the correct information on the topic: 

   1. Symptoms.
   2. Myths. 
   3. Need  Conselling? 
   4. Precautions/Preventative Measures.
   5. Gender Breakdown of Cases.
   6. Cases by Provinces.
   7. Update Summary.
   8. Positive Cases.
   9. Daily Stats.
   10.Contact Rapid Response Team. 
   11.Mode of Transmission.
   
   Share this service ➡️");

   

}

print($response);





//fetch data from openparly api
function requestDataAPI($uri){
   $api = 'https://crnzwhack.herokuapp.com';
   $request_url = $api. '/' . $uri;
   $response = file_get_contents($request_url);
   return $response;

}

//make data from openparly api readable
function DecodeDataAPI($id,$jsonobj){}


//shortList for counselling
function counsellor(){}