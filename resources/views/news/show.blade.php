@extends('layouts.app')

@section('content')

<section class="max-w-5xl mx-auto px-6 py-10">

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- News Image --}}
        @if($news->image)

            <img
                src="{{ asset('storage/news/' . $news->image) }}"
                alt="{{ $news->title }}"
                class="w-full h-[400px] object-cover"
            >

        @endif

        <div class="p-8">

            {{-- Published Date --}}
            @if($news->published_at)

                <p class="text-sm text-gray-500 mb-3">
                    {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}
                </p>

            @endif

            {{-- Title --}}
            <h1 class="text-4xl font-black text-gray-900 mb-6">
                {{ $news->title }}
            </h1>

            {{-- Description --}}
            <div class="prose max-w-none text-gray-700 leading-8">
                {!! nl2br(e($news->description)) !!}
            </div>

            {{-- PDF Download --}}
            @if($news->document)

                <div class="mt-8 pt-6 border-t border-gray-200">

                    <a
                        href="{{ asset('storage/news/documents/' . $news->document) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition"
                    >
                        📄 Download Attachment
                    </a>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection
