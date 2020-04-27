<?php
require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;

$response =  new MessagingResponse();
$guess = $_REQUEST['Body'];
$pick = rand(1,5);

if (in_array($guess, ['gender','breakdown'])) {
   $response->message('kubva ku api');
} elseif ($guess == $pick) {
   $response->message("Yes! You guessed it!");
} else {
   $response->message("Correct information is critical. This service provides the official and up to date information on the status of COVID-19 in Zimbabwe from the Open Parly
   Reply with one of the words in the list below to get the correct information on the topic:  
   News 🆕
   Cases 🗓
   Myths 🛑
   About ℹ️
   Prevention 👍
   Symptoms 🤒
   Treatment 🏥
   Testing 🔬 
   Conditions 📁
   Check 💟 - COVID-19 Risk assessment
   Share this service ➡️");
}

print $response;