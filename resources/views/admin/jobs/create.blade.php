@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- HEADER -->

    <div class="mb-6">

        <h1 class="text-3xl font-black text-gray-900">
            Create Job
        </h1>

        <p class="text-gray-500 mt-1">
            Add a new company job opening
        </p>

    </div>

    <!-- FORM -->

    <form action="/admin/jobs"
          method="POST"
          class="bg-white rounded-2xl shadow-sm p-6">

        @csrf

        <div class="grid md:grid-cols-2 gap-5">

            <!-- TITLE -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Job Title
                </label>

                <input type="text"
                       name="title"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            <!-- DEPARTMENT -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Department
                </label>

                <input type="text"
                       name="department"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

            <!-- LOCATION -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Location
                </label>

                <input type="text"
                       name="location"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

            <!-- EXPERIENCE -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Experience
                </label>

                <input type="text"
                       name="experience"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

            <!-- EMPLOYMENT -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Employment Type
                </label>

                <input type="text"
                       name="employment_type"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

            <!-- VACANCIES -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Vacancies
                </label>

                <input type="number"
                       name="vacancies"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

        </div>

        <!-- DESCRIPTION -->

        <div class="mt-5">

            <label class="block mb-2 text-sm font-semibold">
                Description
            </label>

            <textarea name="description"
                      rows="4"
                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm"></textarea>

        </div>

        <!-- DEADLINE -->

        <div class="mt-5">

            <label class="block mb-2 text-sm font-semibold">
                Deadline
            </label>

            <input type="date"
                   name="deadline"
                   class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

        </div>

        <!-- BUTTON -->

        <div class="mt-6">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-2.5 rounded-xl text-sm font-semibold shadow-lg">

                Create Job

            </button>

        </div>

    </form>

</div>

@endsection