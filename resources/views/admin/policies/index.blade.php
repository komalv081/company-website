@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-black">
            Policies
        </h1>

        <p class="text-gray-500">
            Manage company policies
        </p>

    </div>

    <a href="/admin/policies/create"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl">

        + Add Policy

    </a>

</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left">
                    Title
                </th>

                <th class="px-6 py-4 text-left">
                    Slug
                </th>

                <th class="px-6 py-4 text-left">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($policies as $policy)

            <tr class="border-t">

                <td class="px-6 py-4 font-medium">

                    {{ $policy->title }}

                </td>

                <td class="px-6 py-4 text-gray-500">

                    {{ $policy->slug }}

                </td>

                <td class="px-6 py-4 flex gap-3">

                    <a href="/admin/policies/{{ $policy->id }}/edit"
                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-4 py-2 rounded-lg text-sm">

                        Edit

                    </a>

                    <form action="/admin/policies/{{ $policy->id }}"
                          method="POST"
                          onsubmit="return confirm('Delete policy?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-lg text-sm">

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