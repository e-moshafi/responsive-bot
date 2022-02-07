<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat_bot</title>
    <style type="text/css">
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: #1c1e22;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #4c4c6a;
            border-radius: 2px;
        }

        .chatbox {
            width: 300px;
            height: 400px;
            max-height: 400px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
        }

        .chat-window {
            flex: auto;
            max-height: calc(100% - 60px);
            background: #2f323b;
            overflow: auto;
        }

        .chat-input {
            flex: 0 0 auto;
            height: 60px;
            background: #40434e;
            border-top: 1px solid #2671ff;
            box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
        }

        .chat-input input {
            height: 59px;
            line-height: 60px;
            outline: 0 none;
            border: none;
            width: calc(100% - 60px);
            color: white;
            text-indent: 10px;
            font-size: 12pt;
            padding: 0;
            background: #40434e;
        }

        .chat-input button {
            float: right;
            outline: 0 none;
            border: none;
            background: rgba(255, 255, 255, .25);
            height: 40px;
            width: 40px;
            border-radius: 50%;
            padding: 2px 0 0 0;
            margin: 10px;
            transition: all 0.15s ease-in-out;
        }

        .chat-input input[good]+button {
            box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);
            background: #2671ff;
        }

        .chat-input input[good]+button:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .chat-input input[good]+button path {
            fill: white;
        }

        .msg-container {
            position: relative;
            display: inline-block;
            width: 100%;
            margin: 0 0 10px 0;
            padding: 0;
        }

        .msg-box {
            display: flex;
            background: #5b5e6c;
            padding: 10px 10px 0 10px;
            border-radius: 0 6px 6px 0;
            max-width: 80%;
            width: auto;
            float: left;
            box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);
        }

        .user-img {
            display: inline-block;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #2671ff;
            margin: 0 10px 10px 0;
        }

        .flr {
            flex: 1 0 auto;
            display: flex;
            flex-direction: column;
            width: calc(100% - 50px);
        }

        .messages {
            flex: 1 0 auto;
        }

        .msg {
            display: inline-block;
            font-size: 11pt;
            line-height: 13pt;
            color: rgba(255, 255, 255, .7);
            margin: 0 0 4px 0;
        }

        .msg:first-of-type {
            margin-top: 8px;
        }

        .timestamp {
            color: rgba(0, 0, 0, .38);
            font-size: 8pt;
            margin-bottom: 10px;
        }

        .username {
            margin-right: 3px;
        }

        .posttime {
            margin-left: 3px;
        }

        .msg-self .msg-box {
            border-radius: 6px 0 0 6px;
            background: #2671ff;
            float: right;
        }

        .msg-self .user-img {
            margin: 0 0 10px 10px;
        }

        .msg-self .msg {
            text-align: right;
        }

        .msg-self .timestamp {
            text-align: right;
        }
    </style>
    <script>
        window.onload = function() {

            const request = new XMLHttpRequest();
            request.onload = function() {
                // console.log(this.responseText);
                document.getElementById('chat_box').innerHTML = this.responseText;
            }
            request.open('POST', "ajax.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
        }

        function send_pm() {
            const request = new XMLHttpRequest();
            request.onload = function() {
                console.log(this.responseText);
                document.getElementById('chat_box').innerHTML += this.responseText;
                document.getElementById('message').value = '';
            }
            request.open('POST', "ajax.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send('message=' + document.getElementById('message').value);
            // console.log(document.getElementById('message').value);
        }
        $('.chat-input input').keyup(function(e) {
            if ($(this).val() == '')
                $(this).removeAttr('good');
            else
                $(this).attr('good', '');
        });
    </script>
</head>

<body>
    <section class="chatbox">
        <section class="chat-window" id="chat_box">
        </section>
        <div class="chat-input">
            <input type="text" id="message" placeholder="Type a message" />
            <button onclick="send_pm()">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="rgba(0,0,0,.38)" d="M17,12L12,17V14H8V10H12V7L17,12M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L5,8.09V15.91L12,19.85L19,15.91V8.09L12,4.15Z" />
                </svg>
            </button>
        </div>
    </section>
</body>

</html>