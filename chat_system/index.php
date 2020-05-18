<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chatapp</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" 
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>



  
    <div id="wrapper">

        <h1>Welcome<?php session_start(); echo $_SESSION['username']; ?> to my website</h1>

      <div class="chat_wrapper">
          <div id="abc"></div>
       <div id="chat"> </div>

    <form method="POST" id="messageForm">
    <textarea name="message" cols="30" rows="7" class="textarea"></textarea>
    </form>
        
    </div>
        
    </div>
    <script>

    LoadChat();

    setInterval(function() => {
        LoadChat();
    }, 1000);

        function LoadChat() {
            $.post('handlers/messages.php?action=getMessages', function(response) {

                var scrallpos = $('#chat').scrollTop();
                var scrollpos = parseInt(scrollpos) + 520;
                var scrollHeight = $('#chat').prop('scrollHeight');


            $('#chat').html(response);

            //if scroll position less then scroll height dont do anything 
            //otherwise scroll down

            if(scrollpos < scrollHeight ){

            }else { 
                $('#chat').scrollTop($('#chat').prop('scrollHeight'));


            }
            //making last msg visible
            $('#chat').scrollTop($('#chat').prop('scrollHeight'));

            });

        }
        //using jquery in a script to get alert witout refreshing of page
        $('.textarea').keyup(function(e)) {
            if( e.which == 13) {
                $('form').submit();
            }
        });
        $('form').submit(function()) {

            var message = $('.textarea').val();

            $.post('handlers/messages.php?action=sendMessage&message='+message, function(response) {
    
                    if ( response == 1) {
                        LoadChat();
                        document.getElementById('messageForm').rest();
                    }
                
            });
            return false;
        });
    </script>
</body>
</html>