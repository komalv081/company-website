
@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-black via-gray-900 to-indigo-950 min-h-[75vh] flex items-center shadow-2xl">

    <!-- Glow Effects -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/20 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/20 blur-3xl rounded-full"></div>

    <div class="relative z-10 grid lg:grid-cols-2 gap-16 items-center w-full px-8 lg:px-20 py-12">

        <!-- LEFT CONTENT -->
        <div>

            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/10 px-5 py-2 rounded-full text-sm text-blue-200 mb-6">
                🚀 AI Powered Company Management Platform
            </span>

            <h1 class="text-4xl lg:text-6xl font-black text-white leading-tight mb-8">
                Transform Your
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">
                    Business
                </span>
                Into a Digital Enterprise
            </h1>

            <p class="text-gray-300 text-lg leading-8 mb-10 max-w-2xl">
                A modern company platform to manage jobs, policies,
                news, documents, and future AI-powered knowledge systems
                from one centralized portal.
            </p>

            <div class="flex flex-wrap gap-5 mb-12">

                <a href="/jobs"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-semibold transition shadow-lg hover:shadow-blue-500/30">
                    Explore Jobs
                </a>

                <a href="/documents"
                   class="border border-white/20 bg-white/5 hover:bg-white/10 backdrop-blur-md text-white px-8 py-4 rounded-xl font-semibold transition">
                    View Documents
                </a>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-3 gap-6">

                <div>
                    <h2 class="text-3xl font-bold text-white">50+</h2>
                    <p class="text-gray-400 mt-1">Active Jobs</p>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-white">100+</h2>
                    <p class="text-gray-400 mt-1">Documents</p>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-white">24/7</h2>
                    <p class="text-gray-400 mt-1">AI Support</p>
                </div>

            </div>

        </div>

        <!-- RIGHT CONTENT -->
        <div class="relative flex justify-center">

            <div class="relative">

                <!-- Main Glass Card -->
                <div class="bg-white/10 border border-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl w-full max-w-md">

                    <div class="flex items-center justify-between mb-8">

                        <div>
                            <p class="text-gray-400 text-sm">
                                System Overview
                            </p>

                            <h3 class="text-2xl font-bold text-white mt-1">
                                Company Dashboard
                            </h3>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-blue-500/20 flex items-center justify-center text-2xl">
                            📊
                        </div>

                    </div>

                    <div class="space-y-5">

                        <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                            <div class="flex justify-between items-center mb-3">
                                <h4 class="text-white font-semibold">
                                    Uploaded Documents
                                </h4>
                                <span class="text-green-400 text-sm">
                                    +12%
                                </span>
                            </div>

                            <div class="w-full bg-gray-800 rounded-full h-3">
                                <div class="bg-gradient-to-r from-blue-500 to-cyan-400 h-3 rounded-full w-[75%]"></div>
                            </div>
                        </div>

                        <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                            <div class="flex justify-between items-center mb-3">
                                <h4 class="text-white font-semibold">
                                    AI Knowledge Base
                                </h4>
                                <span class="text-blue-400 text-sm">
                                    Active
                                </span>
                            </div>

                            <div class="flex gap-3 mt-4">
                                <div class="bg-blue-500/20 px-4 py-2 rounded-lg text-blue-300 text-sm">
                                    PDFs
                                </div>

                                <div class="bg-purple-500/20 px-4 py-2 rounded-lg text-purple-300 text-sm">
                                    Policies
                                </div>

                                <div class="bg-cyan-500/20 px-4 py-2 rounded-lg text-cyan-300 text-sm">
                                    News
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6">
                            <h4 class="text-xl font-bold text-white mb-2">
                                Future AI Assistant
                            </h4>

                            <p class="text-blue-100 text-sm leading-6">
                                Your future RAG chatbot will search company
                                documents, policies, and knowledge instantly.
                            </p>
                        </div>

                    </div>

                </div>

                <!-- Floating Card -->
                <div class="absolute -bottom-10 -left-10 bg-white rounded-2xl p-5 shadow-2xl hidden lg:block">
                    <p class="text-gray-500 text-sm mb-1">
                        System Health
                    </p>

                    <h4 class="text-2xl font-black text-green-500">
                        99.9%
                    </h4>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- FEATURES SECTION -->
<section class="py-24">

    <div class="text-center mb-16">

        <span class="text-blue-600 font-semibold uppercase tracking-widest">
            Features
        </span>

        <h2 class="text-5xl font-black mt-4 text-gray-900">
            Everything Your Company Needs
        </h2>

        <p class="text-gray-500 mt-6 text-lg max-w-2xl mx-auto leading-8">
            Manage company operations from one centralized,
            scalable, AI-ready platform.
        </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">

            <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl mb-6">
                💼
            </div>

            <h3 class="text-2xl font-bold mb-4">
                Job Management
            </h3>

            <p class="text-gray-500 leading-7">
                Publish and manage jobs with a modern hiring workflow.
            </p>

        </div>

        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">

            <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl mb-6">
                📰
            </div>

            <h3 class="text-2xl font-bold mb-4">
                Company News
            </h3>

            <p class="text-gray-500 leading-7">
                Share announcements, updates, and business insights.
            </p>

        </div>

        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">

            <div class="w-16 h-16 rounded-2xl bg-cyan-100 flex items-center justify-center text-3xl mb-6">
                📄
            </div>

            <h3 class="text-2xl font-bold mb-4">
                Document Center
            </h3>

            <p class="text-gray-500 leading-7">
                Securely upload and manage important company files.
            </p>

        </div>

        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">

            <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl mb-6">
                🤖
            </div>

            <h3 class="text-2xl font-bold mb-4">
                AI Knowledge Base
            </h3>

            <p class="text-gray-500 leading-7">
                Future-ready RAG chatbot integration for smart search.
            </p>

        </div>

    </div>

</section>

@endsection

