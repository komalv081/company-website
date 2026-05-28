@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-6">

        <h1 class="text-3xl font-black text-gray-900">
            Edit News
        </h1>

    </div>

    <form action="/admin/news/{{ $article->id }}"
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
                       value="{{ $article->title }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Description
                </label>

                <textarea name="description"
                          rows="5"
                          class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm">{{ $article->description }}</textarea>

            </div>

            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Image
                </label>

                <input type="file"
                       name="image"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">

            </div>

            @if($article->image)

                <img src="{{ asset('storage/'.$article->image) }}"
                     class="w-32 h-32 rounded-xl object-cover">

            @endif

            <div>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-2.5 rounded-xl text-sm font-semibold shadow-lg">

                    Update News

                </button>

            </div>

        </div>

    </form>

</div>

@endsection