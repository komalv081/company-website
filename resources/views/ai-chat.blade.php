<!DOCTYPE html>
<html>

<head>

    <title>AI Assistant</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto py-12 px-6">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-4xl font-black mb-2">

            AI Company Assistant

        </h1>

        <p class="text-gray-500 mb-8">

            Ask anything

        </p>

        <form action="/ai-chat" method="POST">

            @csrf

            <textarea
                name="question"
                rows="4"
                class="w-full border rounded-xl p-4"
                placeholder="Ask a question...">{{ $question ?? '' }}</textarea>

            <button
                type="submit"
                class="mt-4 bg-blue-600 text-white px-6 py-3 rounded-xl">

                Ask AI

            </button>

        </form>

        @isset($answer)

            <div class="mt-8 bg-gray-50 p-6 rounded-xl">

                <h2 class="font-bold text-lg mb-3">

                    AI Response

                </h2>

                <p>

                    {{ $answer }}

                </p>

            </div>

        @endisset

    </div>

</div>

</body>

</html>