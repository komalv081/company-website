<!DOCTYPE html>
<html>

<head>

    <title>AI Assistant</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
    <meta  name="csrf-token"  content="{{ csrf_token() }}"></head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-5xl mx-auto py-6 px-4">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-6">

            <h1 class="text-3xl font-bold">
                🤖 AI Mimi
            </h1>

            <p class="text-blue-100 mt-2">
                Your Company AI Assistant
            </p>

        </div>

        <form action="/clear-chat" method="POST">

            @csrf

            <button
                class="bg-blue-500 text-white px-4 py-2 rounded-lg">

                New Chat

            </button>

        </form>
        <!-- Chat Area -->
        <div id="chat-messages" class="max-h-[500px] overflow-y-auto p-6 space-y-4">

        @if(count($messages) == 0)

        <div class="py-16 text-center">

            <div class="text-6xl mb-4">
                🤖
            </div>

            <h2 class="text-2xl font-bold text-gray-800">
                Welcome to AI Mimi
            </h2>

            <p class="text-gray-500 mt-2">
                Ask me anything about your company.
            </p>

        </div>

        @else

            @foreach($messages as $message)

                @if($message->role === 'user')

                    <div class="flex justify-end">

                        <div class="bg-blue-600 text-white px-4 py-3 rounded-2xl max-w-2xl">

                            {{ $message->message }}

                        </div>

                    </div>

                @else

                <div class="flex justify-start">

                    <div class="bg-gray-100 text-gray-800 px-4 py-3 rounded-2xl max-w-2xl">

                        {!! nl2br(e($message->message)) !!}

                    </div>

                </div>

                @endif

            @endforeach

        @endif

        </div>

        <!-- Input -->

        <form action="/ai-chat" method="POST"
              class="border-t p-4 flex gap-3">

            @csrf

            <input
                id="message-input"
                type="text"
                name="question"
                placeholder="Type your message..."
                class="flex-1 border rounded-xl px-4 py-3">

            <button
                id="send-btn"
                type="button"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 rounded-xl">

                Send

            </button>

        </form>

    </div>

</div>
<script>

document
.getElementById('send-btn')
.addEventListener('click', async function() {

    let input = document.getElementById('message-input');

    let question = input.value;
    let chat = document.getElementById('chat-messages');

    chat.innerHTML += `
        <div class="flex justify-end mb-4">

            <div class="bg-blue-600 text-white px-4 py-3 rounded-2xl max-w-2xl">

                ${question}

            </div>

        </div>
    `;
    input.value = '';
    if(question.trim() === '')
    {
        return;
    }

    document.getElementById('send-btn').innerText = 'Thinking...';

    document.getElementById('send-btn').disabled = true;
    let response = await fetch('/ai-chat/send', {

        method: 'POST',

        headers: {

            'Content-Type': 'application/json',

            'X-CSRF-TOKEN':
                document.querySelector(
                    'meta[name="csrf-token"]'
                ).content

        },

        body: JSON.stringify({

            question: question

        })

    });

    let data = await response.json();

    chat.innerHTML += `
    <div class="flex justify-start mb-4">

        <div class="bg-gray-100 text-gray-800 px-4 py-3 rounded-2xl max-w-2xl">

            ${data.answer}

        </div>

    </div>
    `;
    chat.scrollTop = chat.scrollHeight;
    document.getElementById('send-btn').innerText = 'Send';

    document.getElementById('send-btn').disabled = false;

});

</script>
</body>

</html>