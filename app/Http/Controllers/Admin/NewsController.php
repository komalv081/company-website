<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view(
            'admin.news.index',
            compact('news')
        );
    }

    public function create()
    {
        return view(
            'admin.news.create'
        );
    }

    public function store(Request $request)
    {
        $imagePath = null;

        if($request->hasFile('image'))
        {
            $imagePath = $request
                ->file('image')
                ->store(
                    'news',
                    'public'
                );
        }

        News::create([

            'title'=>$request->title,

            'slug'=>Str::slug(
                $request->title
            ),

            'description'=>$request->description,

            'image'=>$imagePath,

            'published_at'=>now(),

            'status'=>'published'
        ]);

        return redirect(
            '/admin/news'
        );
    }

    public function edit($id)
    {
        $article = News::findOrFail($id);

        return view(
            'admin.news.edit',
            compact('article')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $article = News::findOrFail($id);

        $imagePath = $article->image;

        if($request->hasFile('image'))
        {
            $imagePath = $request
                ->file('image')
                ->store(
                    'news',
                    'public'
                );
        }

        $article->update([

            'title'=>$request->title,

            'slug'=>Str::slug(
                $request->title
            ),

            'description'=>$request->description,

            'image'=>$imagePath
        ]);

        return redirect(
            '/admin/news'
        );
    }

    public function destroy($id)
    {
        $article = News::findOrFail($id);

        $article->delete();

        return redirect(
            '/admin/news'
        );
    }
}