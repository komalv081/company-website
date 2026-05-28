<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsPageController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view(
            'news.index',
            compact('news')
        );
    }
}
