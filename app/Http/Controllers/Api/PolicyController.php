<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public function index()
    {
        return response()->json(
            Policy::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $policy=Policy::create([

            'title'=>$request->title,

            'slug'=>Str::slug($request->title),

            'category'=>$request->category,

            'description'=>$request->description,

            'file_url'=>$request->file_url,

            'status'=>$request->status
        ]);

        return response()->json($policy);
    }

    public function update(Request $request,$id)
    {
        $policy=Policy::findOrFail($id);

        $policy->update([

            'title'=>$request->title,

            'category'=>$request->category,

            'description'=>$request->description,

            'file_url'=>$request->file_url,

            'status'=>$request->status
        ]);

        return response()->json($policy);
    }

    public function destroy($id)
    {
        Policy::findOrFail($id)->delete();

        return response()->json([
            'message'=>'Deleted Successfully'
        ]);
    }
}
