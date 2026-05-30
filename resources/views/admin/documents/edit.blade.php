@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-6">

        <h1 class="text-3xl font-black text-gray-900">
            Edit Document
        </h1>

    </div>

    <form action="/admin/documents/{{ $document->id }}"
          method="POST"
          enctype="multipart/form-data"
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
                       value="{{ $document->title }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

            </div>

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Document Type
                </label>

                <select name="type"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

                    <option value="pdf" {{ $document->type == 'pdf' ? 'selected' : '' }}>
                        PDF
                    </option>

                    <option value="doc" {{ $document->type == 'doc' ? 'selected' : '' }}>
                        DOC
                    </option>

                    <option value="xlsx" {{ $document->type == 'xlsx' ? 'selected' : '' }}>
                        XLSX
                    </option>

                </select>

            </div>

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Replace File
                </label>

                <input type="file"
                       name="file"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5">

            </div>

            <div>

                <a href="{{ asset('storage/'.$document->file) }}"
                   target="_blank"
                   class="text-blue-600 hover:text-blue-800">

                    View Current File

                </a>

            </div>

            <div>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-2.5 rounded-xl text-sm font-semibold shadow-lg">

                    Update Document

                </button>

            </div>

        </div>

    </form>

</div>

@endsection