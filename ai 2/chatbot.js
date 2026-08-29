
const API_KEY = 'YOUR_ACTUAL_API_KEY_HERE';
const API_URL = 'https://api.openai.com/v1/chat/completions';

let currentRole = 'admin';

const messageBox = document.getElementById('chatMessages');
const sendBtn = document.getElementById('sendMessage');
const messageInput = document.getElementById('messageInput');
const statusBox = document.getElementById('statusBox');
const roleButtons = document.querySelectorAll('[data-role]');

function setRole(role) {
  currentRole = role;
  const isAdmin = role === 'admin';

 
  roleButtons.forEach((btn) => {
    if (btn.dataset.role === role) {
      btn.classList.add('active', btn.dataset.role === 'admin' ? 'btn-primary' : 'btn-secondary');
      btn.classList.remove('btn-outline-primary', 'btn-outline-secondary');
    } else {
      btn.classList.remove('active', 'btn-primary', 'btn-secondary');
      btn.classList.add(btn.dataset.role === 'admin' ? 'btn-outline-primary' : 'btn-outline-secondary');
    }
  });

  
  statusBox.textContent = isAdmin
    ? 'Admin access granted.'
    : 'Access Denied: You do not have admin permissions to use the chatbot.';

  statusBox.className = isAdmin
    ? 'alert alert-success mt-0 mb-3'
    : 'alert alert-danger mt-0 mb-3';

  messageInput.disabled = !isAdmin;
  sendBtn.disabled = !isAdmin;
}

function addMessage(sender, text, type = 'user') {
  const msg = document.createElement('div');
  msg.className = `mb-2 ${type === 'user' ? 'text-end' : 'text-start'}`;

  const bubble = document.createElement('span');
  bubble.className = `d-inline-block px-3 py-2 rounded ${
    type === 'user'
      ? 'bg-primary text-white'
      : type === 'bot'
      ? 'bg-white text-dark border shadow-sm'
      : 'bg-danger-subtle text-danger border border-danger-subtle'
  }`;
  bubble.textContent = `${sender}: ${text}`;

  msg.appendChild(bubble);
  messageBox.appendChild(msg);
  messageBox.scrollTop = messageBox.scrollHeight;
}

async function sendChatMessage() {
  const text = messageInput.value.trim();
  if (!text) return;

  if (currentRole !== 'admin') {
    addMessage('System', 'Access Denied: You do not have admin permissions to use the chatbot.', 'system');
    return;
  }

  addMessage('You', text, 'user');
  messageInput.value = '';

 
  if (API_KEY === 'YOUR_ACTUAL_API_KEY_HERE') {
    setTimeout(() => {
      addMessage('Bot', `[Demo Reply]: Hello! Admin request received: "${text}"`, 'bot');
    }, 600);
    return;
  }

  try {
    const response = await fetch(API_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Authorization: `Bearer ${API_KEY}`
      },
      body: JSON.stringify({
        model: 'gpt-4o-mini',
        messages: [
          { role: 'system', content: 'You are a helpful assistant.' },
          { role: 'user', content: text }
        ],
        temperature: 0.7
      })
    });

    if (!response.ok) {
      throw new Error(`API error: ${response.status}`);
    }

    const data = await response.json();
    const reply = data.choices?.[0]?.message?.content || 'No response received.';
    addMessage('Bot', reply, 'bot');
  } catch (error) {
    addMessage('System', `Chatbot error: ${error.message}`, 'system');
  }
}

roleButtons.forEach((button) => {
  button.addEventListener('click', () => setRole(button.dataset.role));
});

sendBtn.addEventListener('click', sendChatMessage);
messageInput.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    sendChatMessage();
  }
});


setRole('admin');