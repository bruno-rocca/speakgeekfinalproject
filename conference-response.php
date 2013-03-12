<?php

    // More info on how to use the Twilio Library is here:
    // https://twilio-php.readthedocs.org/en/latest/index.html

    require "twilio-php/Services/Twilio.php";
 
    $conferenceRoomName = $_REQUEST['RoomName'];
    $message = $_REQUEST['Message'];
    
    // Create the response
    $response = new Services_Twilio_Twiml;
    
    // Speak some text
    $response->say($message);
    
    // Drop the person into the conference room
    $dial = $response->dial();
    $dial->conference($conferenceRoomName, array(
        "startConferenceOnEnter" => "true",
        "beep" => "false",
    ));
    
    print $response
?>