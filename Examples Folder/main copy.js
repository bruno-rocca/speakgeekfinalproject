



function sendSMS(phoneNumber, message) {
    
    
    // This snippet sends SMS to a specific number.
    // The destination number and message are currently hardcoded as a part
    // of the 'data' portion below, but can be changed.    
    
    $.ajax
    ({
      type: "GET",
      url: "/sendsms.php",
      dataType: 'json',
      data: { "To" : "+1" + phoneNumber,
              "Message": message
      },
      success: function (results) {
        console.log(results);
        alert(results.message); 
      }
    });    

          
    return false;
}

function conferenceMeIn(phoneNumber1, phoneNumber2) {
    
    /* This snippet :
        1. Calls a specific number
        2. Plays a specific message
        3. Adds that person to the specified Conference Room
    */
    
    $.ajax
    ({
      type: "GET",
      url: "/conference.php",
      dataType: 'json',
      data: { "To" : "+1" + phoneNumber1,
              "Message": "You've got someone who wants to talk to you!",
              "RoomName": "Party Line"
      },
      success: function (results) {
        console.log(results);
      }
    });    
    
    // This snippet repeats the above process with another person and adds
    // them to the same room as above. However, it plays a different message for
    // that person.

    $.ajax
    ({
      type: "GET",
      url: "/conference.php",
      dataType: 'json',
      data: { "To" : "+1" + phoneNumber2,
              "Message": "Welcome to the Party Line! Please hold while we connect the other folks..",
              "RoomName": "Party Line"
      },
      success: function (results) {
        console.log(results);
      }
    });           
          
          
    return false;    
    
    
}
