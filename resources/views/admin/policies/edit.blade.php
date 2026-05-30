@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-6">

        <h1 class="text-3xl font-black">
            Edit Policy
        </h1>

    </div>

    <form action="/admin/policies/{{ $policy->id }}"
          method="POST"
          class="bg-white rounded-2xl shadow-sm p-6">

        @csrf
        @method('PUT')

        <div class="space-y-5">

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Title
                </label>

                <input type="text"
                       name="title"
                       value="{{ $policy->title }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

            </div>

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3">{{ $policy->description }}</textarea>

            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl">

                Update Policy

            </button>

        </div>

    </form>

</div>

@endsection