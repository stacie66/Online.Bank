<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic styling for the chat interface */
        .chat-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chat-box {
            flex-grow: 1;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .chat-box p {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .user-message {
            background-color: #007bff;
            color: #fff;
            text-align: right;
            margin-left: auto;
        }

        .bot-message {
            background-color: #e9ecef;
            color: #000;
            text-align: left;
            margin-right: auto;
        }

        .chat-input {
            display: flex;
        }

        .chat-input input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .chat-input button {
            margin-left: 10px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .chat-container {
                width: 95%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="chat-container">
        <div class="chat-box" id="chatBox">
            <!-- Chat messages will appear here -->
        </div>
        <div class="chat-input">
            <input type="text" id="userInput" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // Handle sending and displaying messages
    function sendMessage() {
        var userMessage = $('#userInput').val();
        if (userMessage.trim() !== "") {
            $('#chatBox').append('<p class="user-message">' + userMessage + '</p>');
            $('#userInput').val('');

            // AJAX call to PHP for bot response
            $.ajax({
                url: 'bot.php',
                method: 'POST',
                data: {message: userMessage},
                success: function(response) {
                    $('#chatBox').append('<p class="bot-message">' + response + '</p>');
                    // Scroll to the bottom
                    $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);
                }
            });
        }
    }

    // Allow pressing Enter to send a message
    $('#userInput').on('keypress', function (e) {
        if (e.which === 13) {
            sendMessage();
        }
    });
</script>

</body>
</html>
