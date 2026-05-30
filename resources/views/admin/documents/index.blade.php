@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-black">
            Documents
        </h1>

        <p class="text-gray-500">
            Manage company documents
        </p>

    </div>

    <a href="/admin/documents/create"
       class="bg-blue-600 text-white px-5 py-2 rounded-xl">

        + Upload Document

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
                    Type
                </th>

                <th class="px-6 py-4 text-left">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($documents as $document)

            <tr class="border-t">

                <td class="px-6 py-4">

                    {{ $document->title }}

                </td>

                <td class="px-6 py-4">

                    {{ strtoupper($document->type) }}

                </td>

                <td class="px-6 py-4 flex gap-3">

                    <a href="{{ asset('storage/'.$document->file) }}"
                       target="_blank"
                       class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm">

                        View

                    </a>

                    <a href="/admin/documents/{{ $document->id }}/edit"
                       class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg text-sm">

                        Edit

                    </a>

                    <form
                        action="/admin/documents/{{ $document->id }}"
                        method="POST"
                        onsubmit="return confirm('Delete document?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm">

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