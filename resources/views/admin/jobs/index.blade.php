@extends('admin.layouts.app')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-4xl font-black text-gray-900">
            Jobs
        </h1>

        <p class="text-gray-500 mt-2">
            Manage company job openings
        </p>

    </div>

    <a href="/admin/jobs/create"
       class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-3 rounded-xl font-semibold shadow-lg">

        + Add Job

    </a>

</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left px-6 py-4">
                    Title
                </th>

                <th class="text-left px-6 py-4">
                    Department
                </th>

                <th class="text-left px-6 py-4">
                    Location
                </th>

                <th class="text-left px-6 py-4">
                    Type
                </th>

                <th class="text-left px-6 py-4">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($jobs as $job)

                <tr class="border-t border-gray-100">

                    <td class="px-6 py-4 font-semibold">
                        {{ $job->title }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $job->department }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $job->location }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $job->employment_type }}
                    </td>

                   <td class="px-6 py-4 flex gap-3">

                        <!-- EDIT -->

                        <a href="/admin/jobs/{{ $job->id }}/edit"
                        class="bg-yellow-100 hover:bg-yellow-200 transition text-yellow-700 px-4 py-2 rounded-lg text-sm font-medium">

                            Edit

                        </a>

                        <!-- DELETE -->

                        <form action="/admin/jobs/{{ $job->id }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this job?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-100 hover:bg-red-200 transition text-red-700 px-4 py-2 rounded-lg text-sm font-medium cursor-pointer">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection