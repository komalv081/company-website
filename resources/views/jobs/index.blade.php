@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-4">
    <!-- HEADER -->

    <div class="flex items-center justify-between mb-6">

        <div>

            <span class="text-blue-600 font-semibold uppercase tracking-widest text-sm">
                Careers
            </span>

            <h1 class="text-4xl font-black text-gray-900 mt-2">
                Open Positions
            </h1>

            <p class="text-gray-500 mt-3">
                Explore opportunities in our growing company.
            </p>

        </div>

        <a href="#"
           class="bg-black hover:bg-blue-600 transition text-white px-6 py-3 rounded-xl font-semibold shadow-lg">

            View All

        </a>

    </div>

    <!-- JOB GRID -->

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">

        @foreach($jobs as $job)

            <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <!-- TOP -->

                <div class="flex items-center justify-between mb-5">

                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">

                        {{ $job->department }}

                    </span>

                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white shadow-lg">

                        💼

                    </div>

                </div>

                <!-- TITLE -->

                <h2 class="text-2xl font-bold text-gray-900 mb-3">

                    {{ $job->title }}

                </h2>

                <!-- DESCRIPTION -->

                <p class="text-gray-500 text-sm leading-6 mb-5 line-clamp-2">

                    {{ $job->description }}

                </p>

                <!-- DETAILS -->

                <div class="space-y-3 text-sm text-gray-600 mb-6">

                    <div class="flex items-center gap-2">
                        📍 {{ $job->location }}
                    </div>

                    <div class="flex items-center gap-2">
                        🧠 {{ $job->experience }}
                    </div>

                    <div class="flex items-center gap-2">
                        ⏰ {{ $job->employment_type }}
                    </div>

                </div>

                <!-- FOOTER -->

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">

                    <div>

                        <p class="text-xs text-gray-400">
                            Vacancies
                        </p>

                        <h4 class="text-lg font-bold text-gray-900">
                            {{ $job->vacancies }}
                        </h4>

                    </div>

                    <button class="bg-black hover:bg-blue-600 transition text-white px-5 py-2 rounded-lg text-sm font-medium">

                        Apply

                    </button>

                </div>

            </div>

        @endforeach

    </div>

</section>

@endsection