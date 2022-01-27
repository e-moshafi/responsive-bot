<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat_bot</title>
    <style type="text/css">
        .container-chat{
            width: 700px;
            height: 400px;
            padding:10px;
            border: 2px solid #000;
            border-radius:5px;
        }
        .chat-box{
            width: 700px;
            height: 300px;
            border: 1px solid #000;
            border-radius:5px
        }
        .send-box{
            width: 700px;
            height: 50px;
        }
        #message {
            width: 100%
        }
    </style>
</head>
<body>
    <div class="container-chat">
        <div class="chat-box"></div>
        <div class="send-box">
             <input type="text" id="message">
        </div>

    </div>
</body>
</html>