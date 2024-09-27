<!-- Include any necessary HTML/CSS for the Orders page -->
<!-- This section should be placed where you want the chat interface to appear -->
<div id="chat-container">
    <h2>Chat</h2>
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
            // Send the message to the server
            socket.emit('chatMessage', { message });

            // Clear the message input field
            messageInput.value = '';
        }
    });

    // Handle receiving messages from the server
    socket.on('chatMessage', (data) => {
        const { message } = data;

        // Display the received message in the chat window
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
    });
</script>
