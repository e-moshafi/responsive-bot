<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat_bot</title>
    <style type="text/css">
        .container-chat {
            width: 700px;
            height: 400px;
            padding: 10px;
            border: 2px solid #000;
            border-radius: 5px;
        }

        .chat-box {
            width: 100%;
            height: 300px;
            border: 1px solid #000;
            border-radius: 5px
        }

        .send-box {
            width: 100%;
            height: 50px;
        }

        #message,
        .btn-send {
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 20px;
            float: left;
        }

        #message {
            width: 80%;
        }

        .bot-pm,
        .user-pm {
            border: 1px solid #000;
            border-radius: 5px;
            min-height: 10px;
            height: auto;
            width: 300px;
            padding: 10px
        }

        .bot-pm {
            float: left;
        }

        .user-pm {
            float: right;
        }
    </style>
    <script>
        window.onload = function() {
            
            const request=new XMLHttpRequest();
            request.onload= function() {
               // console.log(this.responseText);
                document.getElementById('chat_box').innerHTML=this.responseText;
            }
            request.open('POST', "ajax.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
        }
        function send_pm() {
            const request=new XMLHttpRequest();
            request.onload= function() {
                console.log(this.responseText);
                document.getElementById('chat_box').innerHTML+=this.responseText;
                document.getElementById('message').value='';
            }
            request.open('POST', "ajax.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send('message='+document.getElementById('message').value);
           // console.log(document.getElementById('message').value);
        }
    </script>
</head>

<body>
    <div class="container-chat">
        <div class="chat-box" id="chat_box">
            <!-- <div class="bot-pm">

            </div>
            <div class="user-pm">

            </div> -->
        </div>
        <div class="send-box">
            <input type="text" id="message">
            <button type="button" class="btn-send" onclick="send_pm()">send</button>
        </div>

    </div>
</body>

</html>