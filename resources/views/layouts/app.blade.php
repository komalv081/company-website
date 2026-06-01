
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Company Portal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- NAVBAR -->

    <nav class="fixed top-0 left-0 w-full z-50 bg-black/80 backdrop-blur-xl border-b border-white/10">

        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

            <div class="text-3xl font-black text-white tracking-wide">
                Company<span class="text-blue-500">Portal</span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-white font-medium">

                <a href="/"
                   class="hover:text-blue-400 transition">
                    Home
                </a>

                <a href="/jobs"
                   class="hover:text-blue-400 transition">
                    Jobs
                </a>

                <a href="/news"
                   class="hover:text-blue-400 transition">
                    News
                </a>

                <a href="/documents"
                   class="hover:text-blue-400 transition">
                    Documents
                </a>
                <a href="/policies"
                    class="hover:text-blue-400 transition">
                    Policies
                </a>
                <a href="/ai-chat">
                    🤖 AI Assistant
                </a>
            </div>

            <a href="/jobs"
               class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-3 rounded-xl font-semibold shadow-lg hidden md:block">
                Get Started
            </a>

        </div>

    </nav>

    <!-- PAGE CONTENT -->

    <main class="pt-20">

        @yield('content')

    </main>
<!-- FOOTER -->

<footer class="bg-black text-white mt-20">

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- BRAND -->

            <div>

                <h2 class="text-3xl font-black mb-5">
                    Company<span class="text-blue-500">Portal</span>
                </h2>

                <p class="text-gray-400 leading-7">

                    A modern enterprise platform for managing
                    jobs, company news, documents, and future
                    AI-powered knowledge systems.

                </p>

            </div>

            <!-- QUICK LINKS -->

            <div>

                <h3 class="text-xl font-bold mb-5">
                    Quick Links
                </h3>

                <div class="flex flex-col gap-3 text-gray-400">

                    <a href="/"
                       class="hover:text-blue-400 transition">
                        Home
                    </a>

                    <a href="/jobs"
                       class="hover:text-blue-400 transition">
                        Jobs
                    </a>

                    <a href="/news"
                       class="hover:text-blue-400 transition">
                        News
                    </a>

                    <a href="/documents"
                       class="hover:text-blue-400 transition">
                        Documents
                    </a>
                    
                    <a href="/policies"
                       class="hover:text-blue-400 transition">
                        Policies
                    </a>

                </div>

            </div>

            <!-- SERVICES -->

            <div>

                <h3 class="text-xl font-bold mb-5">
                    Services
                </h3>

                <div class="flex flex-col gap-3 text-gray-400">

                    <p>
                        Company Management
                    </p>

                    <p>
                        Recruitment System
                    </p>

                    <p>
                        Document Portal
                    </p>

                    <p>
                        AI Knowledge Base
                    </p>

                </div>

            </div>

            <!-- CONTACT -->

            <div>

                <h3 class="text-xl font-bold mb-5">
                    Contact
                </h3>

                <div class="flex flex-col gap-4 text-gray-400">

                    <p>
                        📍 Bangalore, India
                    </p>

                    <p>
                        📧 support@company.com
                    </p>

                    <p>
                        📞 +91 9876543210
                    </p>

                </div>

            </div>

        </div>

        <!-- BOTTOM -->

        <div class="border-t border-white/10 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm">

            <p>
                © 2026 CompanyPortal. All rights reserved.
            </p>

            <p class="mt-4 md:mt-0">
                Built with Laravel & Tailwind CSS
            </p>

        </div>

    </div>

</footer>
</body>
</html>