<?php
 
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
    $conferenceRoomName = $_REQUEST['RoomName'];
    $message = $_REQUEST['Message'];
    
    // Connect the Call   
    $callResponseURL = "http://" . $ServerName . "/conference-response.php?RoomName=" . urlencode($conferenceRoomName) . "&Message=" . urlencode($message);
    
    $call = $client->account->calls->create(
      $FromNumber, // From this number
      $number, // Call this number
      $callResponseURL
    );     
    
    // Display a confirmation message
    $result['success'] = "True";
    $result['message'] = "Added $number to Conference Call";
    $result['call_result'] = $call;
    
    echo json_encode($result);
    
?>