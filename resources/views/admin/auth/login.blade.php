<!DOCTYPE html>
<html>

<head>

    <title>
        Admin Login
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

        <h1 class="text-3xl font-black mb-6 text-center">

            Admin Login

        </h1>

        @if(session('error'))

            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">

                {{ session('error') }}

            </div>

        @endif

        <form action="/admin/login"
              method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-xl px-4 py-2">

            </div>

            <div class="mb-6">

                <label class="block mb-2">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-xl px-4 py-2">

            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-xl">

                Login

            </button>

        </form>

    </div>

</body>

</html>