@extends('admin.layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">

    <div>

        <h1 class="text-3xl font-black text-gray-900">
            News
        </h1>

        <p class="text-gray-500 mt-1">
            Manage company news articles
        </p>

    </div>

    <a href="/admin/news/create"
       class="bg-blue-600 hover:bg-blue-700 transition text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg">

        + Add News

    </a>

</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left px-6 py-4">
                    Image
                </th>

                <th class="text-left px-6 py-4">
                    Title
                </th>

                <th class="text-left px-6 py-4">
                    Status
                </th>

                <th class="text-left px-6 py-4">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($news as $article)

                <tr class="border-t border-gray-100">

                    <td class="px-6 py-4">

                        @if($article->image)

                            <img src="{{ asset('storage/'.$article->image) }}"
                                 class="w-16 h-16 rounded-xl object-cover">

                        @endif

                    </td>

                    <td class="px-6 py-4 font-semibold">

                        {{ $article->title }}

                    </td>

                    <td class="px-6 py-4">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">

                            {{ $article->status }}

                        </span>

                    </td>

                    <td class="px-6 py-4 flex gap-3">

                        <a href="/admin/news/{{ $article->id }}/edit"
                           class="bg-yellow-100 hover:bg-yellow-200 transition text-yellow-700 px-4 py-2 rounded-lg text-sm font-medium">

                            Edit

                        </a>

                        <form action="/admin/news/{{ $article->id }}"
                              method="POST"
                              onsubmit="return confirm('Delete this news article?')">

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