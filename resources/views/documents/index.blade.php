@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-4">

    <!-- HEADER -->

    <div class="flex items-center justify-between mb-6">

        <div>

            <span class="text-blue-600 font-semibold uppercase tracking-widest text-sm">
                Knowledge Center
            </span>

            <h1 class="text-4xl font-black text-gray-900 mt-2">
                Company Documents
            </h1>

            <p class="text-gray-500 mt-3">
                Access policies, PDFs, reports, and company resources.
            </p>

        </div>

        <a href="#"
           class="bg-black hover:bg-blue-600 transition text-white px-6 py-3 rounded-xl font-semibold shadow-lg">

            Browse All

        </a>

    </div>

    <!-- DOCUMENT GRID -->

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">

        @foreach($documents as $document)

            <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <!-- TOP -->

                <div class="flex items-center justify-between mb-5">

                    <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">

                        {{ strtoupper($document->type) }}

                    </span>

                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center text-white text-xl shadow-lg">

                        📄

                    </div>

                </div>

                <!-- TITLE -->

                <h2 class="text-2xl font-bold text-gray-900 mb-3 leading-tight">

                    {{ $document->title }}

                </h2>

                <!-- SLUG -->

                <p class="text-sm text-gray-500 mb-6">

                    {{ $document->slug }}

                </p>

                <!-- FOOTER -->

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">

                    <div>

                        <p class="text-xs text-gray-400">
                            Document Type
                        </p>

                        <p class="text-sm font-medium text-gray-700">

                            {{ strtoupper($document->type) }}

                        </p>

                    </div>

                    <a href="{{ asset('storage/'.$document->file) }}"
                       target="_blank"
                       class="bg-black hover:bg-blue-600 transition text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md">

                        View PDF

                    </a>

                </div>

            </div>

        @endforeach

    </div>

</section>

@endsection