<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Chat</title>
    <style>
        /* Add CSS styles for the chat interface */
        #chat-container {
            width: 400px;
            margin: auto;
        }
        #chat-messages {
            border: 1px solid #ccc;
            padding: 10px;
            height: 300px;
            overflow-y: scroll;
        }
        #message-input {
            width: 300px;
            padding: 5px;
        }
        #message-form button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <h2>Delivery Chat</h2>
        <div id="chat-messages"></div>
        <form id="message-form">
            <input type="text" id="message-input" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>
    </div>

    <!-- Include the WebSocket JavaScript library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"></script>
    <script>
        // Connect to the WebSocket server
        const socket = io('ws://localhost:3000'); // Replace with your WebSocket server URL

        // Handle form submission (sending messages)
        document.getElementById('message-form').addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent form submission

            const messageInput = document.getElementById('message-input');
            const message = messageInput.value.trim();

            if (message !== '') {
                // Send the message to the server with sender information
                socket.emit('chatMessage', { message, sender: 'delivery' });

                // Clear the message input field
                messageInput.value = '';
            }
        });

        // Handle receiving messages from the server
        socket.on('chatMessage', (data) => {
            const { message, sender } = data;

            // Display the received message in the chat window
            const chatMessages = document.getElementById('chat-messages');
            const messageElement = document.createElement('div');
            messageElement.textContent = `${sender}: ${message}`; // Display sender's name
            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to bottom
        });
    </script>
</body>
</html>
