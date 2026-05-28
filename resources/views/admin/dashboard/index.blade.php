@extends('admin.layouts.app')

@section('content')

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

    <!-- CARD -->

    <div class="bg-white rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-gray-500">
                    Total Jobs
                </p>

                <h2 class="text-4xl font-black mt-2">
                   {{ $totalJobs }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">

                💼

            </div>

        </div>

    </div>

    <!-- CARD -->

    <div class="bg-white rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-gray-500">
                    News Articles
                </p>

                <h2 class="text-4xl font-black mt-2">
                    {{ $totalJobs }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl">

                📰

            </div>

        </div>

    </div>

    <!-- CARD -->

    <div class="bg-white rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-gray-500">
                    Documents
                </p>

                <h2 class="text-4xl font-black mt-2">
                    {{ $totalDocuments }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl">

                📄

            </div>

        </div>

    </div>

    <!-- CARD -->

    <div class="bg-white rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-gray-500">
                    Policies
                </p>

                <h2 class="text-4xl font-black mt-2">
                    {{ $totalPolicies }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                📘

            </div>

        </div>

    </div>

</div>

@endsection