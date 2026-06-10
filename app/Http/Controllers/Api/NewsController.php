<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json(
            News::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $news = News::create([

            'title'=>$request->title,

            'slug'=>Str::slug($request->title),

            'description'=>$request->description,

            'image'=>$request->image,

            'published_at'=>now(),

            'status'=>$request->status
        ]);

        return response()->json($news);
    }

    public function update(Request $request,$id)
    {
        $news=News::findOrFail($id);

        $news->update([

            'title'=>$request->title,

            'description'=>$request->description,

            'image'=>$request->image,

            'status'=>$request->status
        ]);

        return response()->json($news);
    }

    public function destroy($id)
    {
        News::findOrFail($id)->delete();

        return response()->json([
            'message'=>'Deleted Successfully'
        ]);
    }
    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        return view(
            'news.show',
            compact('news')
        );
    }
}
