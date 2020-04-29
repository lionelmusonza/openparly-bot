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
       $response->message("1. Spraying chlorine or alcohol on the skin kills viruses in the body\nApplying alcohol or chlorine to the body can cause harm, especially if it enters the eyes or mouth. Although people can use these chemicals to disinfect surfaces, they should not use them on the skin.\nThese products cannot kill viruses within the body.\n\n2. Only older adults and young people are at risk\nSARS-CoV-2, like other coronaviruses, can infect people of any age. However, older adults and individuals with preexisting health conditions, such as diabetes or asthma, are more likely to become severely ill.\n\n3. Children cannot get COVID-19\nAll age groups can contract SARS-CoV-2.\nSo far, most cases have been in adults, but children are not immune. In fact, preliminary evidence suggests that children are just as likely to contract it, but their symptoms tend to be less severe.\n\n4. COVID-19 is just like the flu\nSARS-CoV-2 causes an illness that does have flu-like symptoms, such as aches, a fever, and a cough. Similarly, both COVID-19 and the flu can be mild, severe, or, in rare cases, fatal. Both can also lead to pneumonia.\nHowever, the overall profile of COVID-19 is more serious. Estimates vary, but its mortality rate seems to be between about 1% and 3%.\nAlthough scientists are still working out the exact mortality rate, it is likely to be many times higher than that of seasonal flu.\n\n5. Everyone with COVID-19 dies\nThis statement is untrue. ");
       break;
   case 3:
       $response->message(allocateCounsellor(trim($_REQUEST['From'],"whatsapp:+"),$conn));
       break;
   case 4:
       $response->message(requestDataAPI($uri));
       break;
   case 5:
       $z = requestDataAPI('sexUpdate');
       $x = DecodeDataAPI(5,$z);
       $response->message($x);
       break;
   case 6:
       $response->message(DecodeDataAPI(6,requestDataAPI('CasesProvince')));
       break;
   case 7:
       $response->message(DecodeDataAPI(7,requestDataAPI('UpdateSummary')));
       break;
   case 8:
       $response->message(DecodeDataAPI(8,requestDataAPI('apicase')));
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

 //make data from openparly api readable
function DecodeDataAPI($id,$jsonobj){
   

   switch ($id) {
   
      case 3:
         # code...
         break;
      case 4:
         # code...
         break;
      case 5:
         $string = "Gender Breakdown of Cases:\nMales:". json_decode($jsonobj)['0']->male ."\nFemales:". json_decode($jsonobj)['0']->female;
         break;
      case 6:
         $string = "COVID-19 cases at Provincial Level:
            \nBulawayo: ". json_decode($jsonobj)['0']->Bulawayo.
            "\nHarare: ". json_decode($jsonobj)['0']->Harare .
            "\nManicaland: ". json_decode($jsonobj)['0']->Manicaland .
            "\nMashonaland Central: ". json_decode($jsonobj)['0']->Mashonaland_Central .
            "\nMashonaland East: ". json_decode($jsonobj)['0']->Mashonaland_East .
            "\nMashonaland West: ". json_decode($jsonobj)['0']->Mashonaland_West . 
            "\nMasvingo: ". json_decode($jsonobj)['0']->Masvingo .
            "\nMatabeleland North: ". json_decode($jsonobj)['0']->Matabeleland_North .
            "\nMatabeleland South: ". json_decode($jsonobj)['0']->Matabeleland_South .
            "\nMidlands: ". json_decode($jsonobj)['0']->Midlands .
            "\n\n Follow the directions of your local health authority.\nAvoiding unneeded visits to medical facilities allows healthcare systems to operate more effectively, therefore protecting you and others.\n#COVID19 #HealthyAtHome";
         break;
      case 7:
         $string = "COVID-19 Update Summary:
            \nTotal Tests: ". json_decode($jsonobj)['0']->TotalTests .
            "\nPositive Cases: ". json_decode($jsonobj)['0']->PositiveCases .
            "\nNegative Cases: ". json_decode($jsonobj)['0']->NegativeCases .
            "\nDeaths: ". json_decode($jsonobj)['0']->Deaths .
            "\nICU: ". json_decode($jsonobj)['0']->ICU .
            "\nAverage Age: ". json_decode($jsonobj)['0']->AverageAge . 
            "\nMedian Age: ". json_decode($jsonobj)['0']->MedianAge .
            "\nMinimum Age: ". json_decode($jsonobj)['0']->MinimumAge .
            "\nMaximum Age: ". json_decode($jsonobj)['0']->MaximumAge .
            "\n\nTip: COVER your cough. Cover your nose and mouth with your bent elbow or a tissue when you cough or sneeze.\n#COVID19 #HealthyAtHome";
         break;
      case 8:
         $string .= "Zimbabwe COVID-19 positive cases:";
         foreach (json_decode($jsonobj) as $value) {
            
            $string .= " 
             \nCase Number:". $value->caseId.
            "\nAge:" . $value->age .
            "\nGender:" . $value->gender .
            "\nCity:" . $value->city .
            "\nAge:" . $value->age .
            "\nDate Confirmed:" . $value->dateConfirmation .
            "\nTravel History:" . $value->travelHistoryLocation;
            
            if($value->caseId===13)
               break;
            
          }
          
          $string.="\n\nTIP: When you wear a mask wear it the right way. If you have a fever, a cough, and difficulty breathing, seek medical attention. Call in advance. #covid19 #HealthyAtHome";
         break;
      case 9:
         $todays_data = end($data);
         $string = "Zimbabwe Daily COVID-19 Statistics:
         \nCummilative Country Total Cases:". $todays_data['CMTTOTAL'] .
         "\nCountry Total Tested:". $todays_data['TOTALTS'] .
         "\nCountry Total Positive Tests:". $todays_data['TOTALPSTV'] .
         "\nCountry Total Positive ReTests:". $todays_data['TOTALPSTVRETES'] .
         "\nCountry Total Deaths:". $todays_data['TOTALDEAD'] .
         "\nCountry Total in ICU:". $todays_data['TOTALICU'] .
         "\nCountry Total recovered:". $todays_data['TOTALRCVD'] .
         "<br>\nTIP: KEEP a safe distance. Maintain a safe distance from anyone who is coughing or sneezing. \n#COVID19 #HealthyAtHome";
         break;
      case 11:
         $string = "Zimbabwe Daily COVID-19 Modes of Transmission:
         \nTravel:". $data['travel'] . 
         "\nLocal:". $data['local'] .
         "<br> \n WASH hands often. Clean your hands often. Use soap and water, or an alcohol-based hand rub. \n#COVID19 #HealthyAtHome";
         break;
      default:
        $string = "ALERT! \nPlease select a valid option";
         break;
   }

   return $string;
}