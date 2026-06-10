@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-4">

    <!-- HEADER -->

    <div class="flex items-center justify-between mb-5">

        <div>

            <span class="text-blue-600 font-semibold uppercase tracking-widest text-sm">
                Latest Updates
            </span>

            <h1 class="text-4xl font-black text-gray-900 mt-2">
                Company News
            </h1>

            <p class="text-gray-500 mt-2">
                Stay updated with announcements and company activities.
            </p>

        </div>

        <a href="#"
           class="bg-black hover:bg-blue-600 transition text-white px-5 py-2 rounded-xl font-semibold shadow-lg text-sm">

            Explore News

        </a>

    </div>

    <!-- NEWS GRID -->

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-4">

        @foreach($news as $article)

            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <!-- IMAGE -->

                @if($article->image)

                    <img src="{{ asset('storage/app/public/news'.$article->image) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-32 object-cover">

                @else

                    <div class="w-full h-32 bg-gradient-to-br from-blue-500 to-indigo-700 flex items-center justify-center text-white text-4xl">

                        📰

                    </div>

                @endif

                <!-- CONTENT -->

                <div class="p-4">

                    <!-- BADGE -->

                    <div class="mb-3">

                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">

                            NEWS

                        </span>

                    </div>

                    <!-- TITLE -->

                    <h2 class="text-xl font-bold text-gray-900 mb-2 leading-snug line-clamp-2">

                        {{ $article->title }}

                    </h2>

                    <!-- DESCRIPTION -->

                    <p class="text-gray-500 text-sm leading-6 mb-4 line-clamp-2">

                        {{ $article->description }}

                    </p>

                    <!-- FOOTER -->

                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">

                        <div>

                            <p class="text-xs text-gray-400">
                                News
                            </p>

                            <p class="text-xs font-medium text-gray-700 truncate max-w-[100px]">

                                {{ $article->slug }}

                            </p>

                        </div>

                        <a href="{{ route('news.show', $article->slug) }}"
                        class="bg-black hover:bg-blue-600 transition text-white px-3 py-2 rounded-lg text-xs font-medium">

                            Read

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>

@endsection
