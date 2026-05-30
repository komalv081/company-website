@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-6">

        <h1 class="text-3xl font-black">
            Create Policy
        </h1>

        <p class="text-gray-500">
            Add a new company policy
        </p>

    </div>

    <form action="/admin/policies"
          method="POST"
          class="bg-white rounded-2xl shadow-sm p-6">

        @csrf

        <div class="space-y-5">

            <!-- TITLE -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

            </div>

            <!-- CATEGORY -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Category
                </label>

                <input
                    type="text"
                    name="category"
                    placeholder="HR, Privacy, Legal, IT..."
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

            </div>

            <!-- DESCRIPTION -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3"></textarea>

            </div>

            <!-- FILE URL -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    File URL
                </label>

                <input
                    type="text"
                    name="file_url"
                    placeholder="https://example.com/policy.pdf"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

            </div>

            <!-- STATUS -->

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

                    <option value="published">
                        Published
                    </option>

                    <option value="draft">
                        Draft
                    </option>

                </select>

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl">

                Create Policy

            </button>

        </div>

    </form>

</div>

@endsection