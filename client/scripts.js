// Select DOM elements
const chatBody = document.getElementById('chat-body');
const chatInput = document.getElementById('chat-input');
const sendBtn = document.getElementById('send-btn');

// Event listener for send button
sendBtn.addEventListener('click', () => {
    const userMessage = chatInput.value.trim();

    if (userMessage) {
        appendMessage(userMessage, 'user');
        getBotResponse(userMessage);
        chatInput.value = ''; // Clear input field
    }
});

// Function to append message to chat
function appendMessage(message, sender) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', sender === 'user' ? 'user-message' : 'bot-message');
    
    const messageContent = document.createElement('span');
    messageContent.classList.add('message-content');
    messageContent.textContent = message;
    
    messageElement.appendChild(messageContent);
    chatBody.appendChild(messageElement);
    
    // Scroll to the bottom of chat body
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Function to generate bot response
function getBotResponse(userMessage) {
    let botResponse = '';

    // Simple bot responses
    if (userMessage.toLowerCase().includes('hello')) {
        botResponse = 'Hi! How can I help you today?';
    } else if (userMessage.toLowerCase().includes('how are you')) {
        botResponse = "I'm just a bot, but I'm doing great!";
    } else if (userMessage.toLowerCase().includes('bye')) {
        botResponse = 'Goodbye! Have a nice day!';
    } else {
        botResponse = "Sorry, I don't understand that.";
    }

    // Delay bot response to simulate real-time conversation
    setTimeout(() => {
        appendMessage(botResponse, 'bot');
    }, 500); // 500ms delay
}
