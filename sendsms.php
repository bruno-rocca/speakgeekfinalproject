<?php
    /* Send an SMS using Twilio.
     */
     
    // More info on how to use the Twilio Library is here:
    // https://twilio-php.readthedocs.org/en/latest/index.html     
 
    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
    require "twilio-php/Services/Twilio.php";
 
    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    require "twilio-config.php";
 
    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    // Step 4: Extract the parameters that were passed in from the API call
    $number = $_REQUEST['To'];
    $message = $_REQUEST['Message'];
    
     
    $sms = $client->account->sms_messages->create(

    // Step 5: Change the 'From' number below to be a valid Twilio number 
    // that you've purchased, or the (deprecated) Sandbox number
        $FromNumber, 

        // the number we are sending to - Any phone number
        $number,

        // the sms body
        $message
    ); 
    

    // Display a confirmation message on the screen
    $result['success'] = "True";
    $result['message'] = "Sent message to $number";
    $result['sms_result'] = $sms;
    
    echo json_encode($result);
    
?>