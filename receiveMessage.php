<?php
require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;


$serverName = "db4free.net:3306";
$username = "nyaradzo";
$password = "defaultnyaradzopassword";
$dbname = "nyaradzo";
$conn = new mysqli($serverName, $username, $password, $dbname);

$response =  new MessagingResponse();
$msg = $_REQUEST['Body'];


switch ($msg) {
   case 1:
       $response->message("The most common symptoms of COVID-19 are:\n-fever\n\n-tiredness \n\n-sore throat \n\n-dry cough \n\n-shortness of breath \n\nImportant: For an estimated 80% of people infected with COVID-19, the symptoms are mild and they need to self-isolation to stop the spread of the disease. For a small number, the consequences are more serious.\n\nDon't panic: Having the symptoms doesn't mean that you have COVID-19. The symptoms are like other illnesses that are much more common, like the flu. \n\n\nWhat is the difference between influenza (flu) and COVID-19? \n\nDon’t get mixed up between the flu and COVID-19. There are some important differences.\n\nSpeed of transmission: The flu has a shorter incubation period than COVID-19. Incubation refers to the time between getting infected and noticing symptoms.\n\nSeverity: Currently around 15% of COVID-19 infections are severe, requiring oxygen. About 5% is critical, requiring ventilation. The number of severe and critical infections are higher than those caused by the flu.\n\nMortality: The mortality of COVID-19 appears higher than for the flu.\n\nLearn more to be ready for COVID-19 at www.mohcc.gov.zw/\n\nNational emergency response Hotline: 08002000");
       break;
   case 2:
       $response->message("1. Spraying chlorine or alcohol on the skin kills viruses in the body\nApplying alcohol or chlorine to the body can cause harm, especially if it enters the eyes or mouth. Although people can use these chemicals to disinfect surfaces, they should not use them on the skin.\nThese products cannot kill viruses within the body.\n\n8. Only older adults and young people are at risk\nSARS-CoV-2, like other coronaviruses, can infect people of any age. However, older adults and individuals with preexisting health conditions, such as diabetes or asthma, are more likely to become severely ill.\n\n3. Children cannot get COVID-19\nAll age groups can contract SARS-CoV-2.\nSo far, most cases have been in adults, but children are not immune. In fact, preliminary evidence suggests that children are just as likely to contract it, but their symptoms tend to be less severe.\n\n4. COVID-19 is just like the flu\nSARS-CoV-2 causes an illness that does have flu-like symptoms, such as aches, a fever, and a cough. Similarly, both COVID-19 and the flu can be mild, severe, or, in rare cases, fatal. Both can also lead to pneumonia.\nHowever, the overall profile of COVID-19 is more serious. Estimates vary, but its mortality rate seems to be between about 1% and 3%.\nAlthough scientists are still working out the exact mortality rate, it is likely to be many times higher than that of seasonal flu.\n\n5. Everyone with COVID-19 dies\nThis statement is untrue. ");
       break;
   case 3:
       $response->message(allocateCounsellor(trim($_REQUEST['From'],"whatsapp:+"),$conn));
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
         $response->message("National emergency response Hotline: 08002000");
         break;
   case 11:
       $response->message(requestDataAPI('transmissionUpdate'));
       break;
  
   default:
   $response->message("Correct information is critical. This service provides the official and up to date information on the status of COVID-19 in Zimbabwe from the OpenParly.
   \nReply with one of the numbers corresponding to a topic in the list below to get the correct information on the topic:\n\n 1. Symptoms.\n 2. Myths.\n 3. Need  Conselling?\n 4. Precautions/Preventative Measures.\n 5. Gender Breakdown of Cases.\n 6. Cases by Provinces.\n 7. Update Summary.\n 8. Positive Cases.\n 9. Daily Stats.\n 10.Contact Rapid Response Team.\n 11.Mode of Transmission.\nShare this service ➡️");

   

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
function allocateCounsellor($wanum,$conn){
   $waNumber = $wanum;
   $chatID = rand(8000,324094230);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }


   $sql = "INSERT INTO todos(phone,chatID)
   VALUES ($waNumber, $chatID)";
   $sql2 = "SELECT * FROM todos WHERE phone='$waNumber'";

   if($conn->query($sql2)->num_rows===0){
      if ($conn->query($sql) === TRUE) {
         //echo "New record created successfully";
         $resp = 'A counsellor will contact you as soon as possible use this verification number when asked: ' . $chatID;
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
   else
      $resp = 'A previous request is still pending, a counsellor will attend to you as soon as available. ';
      

   

   //$conn->close();
   
   return $resp;
}