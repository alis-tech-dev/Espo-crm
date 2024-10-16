async function sendChatGPTRequest(apiKey, model, messages) {
    const url = 'https://api.openai.com/v1/chat/completions';

    const data = {
        model: model,
        messages: messages
    };

    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${apiKey}`
        },
        body: JSON.stringify(data)
    });

    if (!response.ok) {
        const errorMessage = await response.text();
        throw new Error(`Request failed: ${errorMessage}`);
    }

    const responseData = await response.json();
    return responseData.choices[0].message.content;
}

function saveMessages() {
    const messagesDiv = document.getElementById('chatgpt-bot-messages');
    localStorage.setItem('chatMessages', messagesDiv.innerHTML);
}

function loadMessages() {
    const messagesDiv = document.getElementById('chatgpt-bot-messages');
    const savedMessages = localStorage.getItem('chatMessages');
    if (savedMessages) {
        messagesDiv.innerHTML = savedMessages;
        scrollToBottom();
    }
}

function scrollToBottom() {
    const messagesDiv = document.getElementById('chatgpt-bot-messages');
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

async function initChatBot() {
    const chatBot = document.getElementById('chatgpt-bot');
    const resizeHandles = document.querySelectorAll('.resize-handle');
    const collapseButton = document.getElementById('chatgpt-bot-collapse');
    const toggleThemeButton = document.getElementById('chatgpt-bot-toggle-theme');
    const sendButton = document.getElementById('chatgpt-bot-send');
    const inputField = document.getElementById('chatgpt-bot-input');
    const messagesDiv = document.getElementById('chatgpt-bot-messages');
    const header = document.getElementById('chatgpt-bot-header');
    const resizeHandleNW = document.getElementById('chatgpt-bot-resize-handle-nw');
    const chatButton = document.querySelector('.chat-button');
    
    let darkTheme = false;

    let isResizing = false;
    let isDragging = false;
    let startX, startY, startWidth, startHeight;
    let lastPageX, lastPageY;

    let loadingIndicator = document.createElement('div');
    loadingIndicator.textContent = '...';
    loadingIndicator.style.display = 'none';

    if (!chatBot || !resizeHandles.length || !collapseButton || !toggleThemeButton || !sendButton || !inputField || !messagesDiv || !header || !resizeHandleNW) {
        console.error('One or more chat bot elements are missing.');
        return;
    }

    chatBot.style.display = 'none';
    loadMessages();

    addEventListeners();

    header.addEventListener('mousedown', function (e) {
        isDragging = true;
        lastPageX = chatBot.offsetLeft;
        lastPageY = chatBot.offsetTop;
        startX = e.clientX;
        startY = e.clientY;
        window.addEventListener('mousemove', drag);
        window.addEventListener('mouseup', stopDrag);
        e.preventDefault(); // Prevent text selection
    });

    function drag(e) {
        if (isDragging) {
            const dx = e.clientX - startX;
            const dy = e.clientY - startY;
            chatBot.style.left = lastPageX + dx + 'px';
            chatBot.style.top = lastPageY + dy + 'px';
        }
    }

    function stopDrag() {
        isDragging = false;
        window.removeEventListener('mousemove', drag);
        window.removeEventListener('mouseup', stopDrag);
    }

    resizeHandles.forEach(handle => {
        handle.addEventListener('mousedown', function (e) {
            isResizing = true;
            startX = e.clientX;
            startY = e.clientY;
            startWidth = chatBot.offsetWidth;
            startHeight = chatBot.offsetHeight;
            lastPageX = chatBot.offsetLeft;
            lastPageY = chatBot.offsetTop;
            window.addEventListener('mousemove', resize);
            window.addEventListener('mouseup', stopResize);
            e.preventDefault(); // Prevent text selection
        });
    });

    function resize(e) {
        if (isResizing) {
            const dx = e.clientX - startX;
            const dy = e.clientY - startY;

            if (resizeHandleNW.contains(e.target)) {
                chatBot.style.width = startWidth - dx + 'px';
                chatBot.style.height = startHeight - dy + 'px';
                chatBot.style.left = lastPageX + dx + 'px';
                chatBot.style.top = lastPageY + dy + 'px';
            }
        }
    }

    function stopResize() {
        isResizing = false;
        window.removeEventListener('mousemove', resize);
        window.removeEventListener('mouseup', stopResize);
    }

    function sendMessage() {
        const input = inputField.value.trim();

        if (input === '') {
            return;
        }

        const currentTime = new Date().toLocaleTimeString();

        const userMessageContainer = document.createElement('div');
        userMessageContainer.classList.add('message-container', 'user-message');

        const userMessage = document.createElement('div');
        userMessage.classList.add('message');
        userMessage.textContent = input;

        const userTime = document.createElement('div');
        userTime.classList.add('message-time');
        userTime.textContent = currentTime;
        
        if (darkTheme) {
            userMessage.classList.add("dark");
        }

        userMessageContainer.appendChild(userMessage);
        userMessageContainer.appendChild(userTime);
        messagesDiv.appendChild(userMessageContainer);

        inputField.value = '';

        saveMessages();
        scrollToBottom();
        showLoadingIndicator();

        sendChatMessage(input)
            .then(botResponse => {
                const currentTime = new Date().toLocaleTimeString();

                const botMessageContainer = document.createElement('div');
                botMessageContainer.classList.add('message-container', 'bot-message');

                const botMessage = document.createElement('div');
                botMessage.classList.add('message');

                const botSender = document.createElement('div');
                botSender.classList.add('message-sender');
                botSender.textContent = 'Alis-Tech Helper';
                botMessage.appendChild(botSender);

                botMessage.innerHTML += botResponse;

                const botTime = document.createElement('div');
                
                if (darkTheme) {
                    botMessage.classList.add("dark");
                }
                
                botTime.classList.add('message-time');
                botTime.textContent = currentTime;

                botMessageContainer.appendChild(botMessage);
                botMessageContainer.appendChild(botTime);
                messagesDiv.appendChild(botMessageContainer);

                saveMessages();
                scrollToBottom();
            })
            .catch(error => {
                console.error('Error sending message to chat bot:', error);
            })
            .finally(() => {
                hideLoadingIndicator();
            });
    }

    function showLoadingIndicator() {
        messagesDiv.appendChild(loadingIndicator);
        loadingIndicator.style.display = 'inline';
        scrollToBottom();
    }

    function hideLoadingIndicator() {
        loadingIndicator.style.display = 'none';
    }

    async function sendChatMessage(input) {
        const apiKey = "sk-proj-KWTxoRXykyMdcRwEEaEnT3BlbkFJI2atM330lMq5SJzMYmTO";
        const model = 'gpt-4';
        const messages = [
            {"role": "system", "content": "You are a helpful assistant."},
            {"role": "system", "content": "25W projector, 100W projector, and 300W-I projector use a GOBO glass of 37mm in diameter with the maximum symbol&nbsp;diameter&nbsp;26mm."},
            {"role": "system", "content": "End response with 'Alis Helper'."},
            {"role": "user", "content": input}
        ];
        return await sendChatGPTRequest(apiKey, model, messages);
    }

    function addEventListeners() {
        collapseButton.addEventListener('click', toggleCollapse);

        toggleThemeButton.addEventListener('click', toggleTheme);

        sendButton.addEventListener('click', sendMessage);
        inputField.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        window.addEventListener('beforeunload', saveMessages);
    }

    function toggleCollapse() {
        chatBot.classList.toggle('collapsed');
        chatBot.style.display = chatBot.style.display === 'none' ? 'flex' : 'none';
    }

    function toggleTheme() {
        darkTheme = !darkTheme;
        chatBot.classList.toggle('dark');
        inputField.classList.toggle('dark');
        const messageContainers = document.querySelectorAll('.message-container .message');
        messageContainers.forEach(message => {
            message.classList.toggle('dark');
        });
    }

    function checkEnterKey(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    }
    chatButton.addEventListener('click', function() {
        toggleCollapse();
    });

}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
        initChatBot().then(r => {console.log('')});
    });
} else {
    initChatBot().then(r => {console.log('Chatbot error!!!')});
}

window.addEventListener('DOMContentLoaded', function () {
    console.log('Hash changed to: ', window.location.hash);
    if (!document.getElementById('chatgpt-bot')) {
        initChatBot().then(r => {console.log('Chatbot error!!!')});
    } else {
        loadMessages();
    }
});



// const apiKey = "sk-proj-KWTxoRXykyMdcRwEEaEnT3BlbkFJI2atM330lMq5SJzMYmTO";
