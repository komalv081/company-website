@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-4">

    <!-- HEADER -->

    <div class="flex items-center justify-between mb-6">

        <div>

            <span class="text-blue-600 font-semibold uppercase tracking-widest text-sm">
                Company Rules
            </span>

            <h1 class="text-4xl font-black text-gray-900 mt-2">
                Policies & Guidelines
            </h1>

            <p class="text-gray-500 mt-2">
                Important company policies and operational guidelines.
            </p>

        </div>

        <a href="#"
           class="bg-black hover:bg-blue-600 transition text-white px-5 py-2 rounded-xl font-semibold shadow-lg text-sm">

            Explore Policies

        </a>

    </div>

    <!-- POLICY GRID -->

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">

        @foreach($policies as $policy)

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <!-- TOP -->

                <div class="flex items-center justify-between mb-5">

                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">

                        POLICY

                    </span>

                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white text-xl shadow-lg">

                        📘

                    </div>

                </div>

                <!-- TITLE -->

                <h2 class="text-xl font-bold text-gray-900 mb-3 leading-snug line-clamp-2">

                    {{ $policy->title }}

                </h2>

                <!-- DESCRIPTION -->

                <p class="text-gray-500 text-sm leading-6 mb-5 line-clamp-3">

                    {{ $policy->description }}

                </p>

                <!-- FOOTER -->

                <div class="flex items-center justify-between pt-3 border-t border-gray-100">

                    <div>

                        <p class="text-xs text-gray-400">
                            Policy
                        </p>

                        <p class="text-xs font-medium text-gray-700 truncate max-w-[120px]">

                            {{ $policy->slug }}

                        </p>

                    </div>

                    <a href="#"
                       class="bg-black hover:bg-blue-600 transition text-white px-3 py-2 rounded-lg text-xs font-medium">

                        Read

                    </a>

                </div>

            </div>

        @endforeach

    </div>

</section>

@endsection