<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->

        <aside class="w-72 bg-black text-white flex flex-col">

            <!-- LOGO -->

            <div class="p-6 border-b border-white/10">

                <h1 class="text-3xl font-black">
                    Admin<span class="text-blue-500">Panel</span>
                </h1>

            </div>

            <!-- MENU -->

            <nav class="flex-1 p-5 space-y-3">

                <a href="/admin"
                   class="block px-5 py-3 rounded-xl hover:bg-blue-600 transition">

                    📊 Dashboard

                </a>

                <a href="/admin/jobs"
                   class="block px-5 py-3 rounded-xl hover:bg-blue-600 transition">

                    💼 Jobs

                </a>

                <a href="/admin/news"
                   class="block px-5 py-3 rounded-xl hover:bg-blue-600 transition">

                    📰 News

                </a>

                <a href="/admin/documents"
                   class="block px-5 py-3 rounded-xl hover:bg-blue-600 transition">

                    📄 Documents

                </a>

                <a href="/admin/policies"
                   class="block px-5 py-3 rounded-xl hover:bg-blue-600 transition">

                    📘 Policies

                </a>
                <a href="/admin/knowledge-base"
                   class="block px-5 py-3 rounded-xl hover:bg-blue-600 transition">

                    🧠 Knowledge Base

                </a>

            </nav>

        </aside>

        <!-- MAIN -->

        <main class="flex-1">

            <!-- TOPBAR -->

            <header class="bg-white shadow-sm px-8 py-5 flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold text-gray-900">
                        Admin Dashboard
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        Manage your company portal
                    </p>

                </div>

            <div class="flex items-center gap-4">

                <div class="text-right">

                    <h3 class="font-bold">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        Administrator
                    </p>

                </div>

                <form action="/admin/logout" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                        Logout

                    </button>

                </form>

            </div>

            </header>

            <!-- CONTENT -->

            <div class="p-8">

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>
