<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::latest()->get();

        return view(
            'admin.policies.index',
            compact('policies')
        );
    }

    public function create()
    {
        return view(
            'admin.policies.create'
        );
    }

    public function store(Request $request)
    {
       Policy::create([

            'title'       => $request->title,

            'slug'        => Str::slug($request->title),

            'category'    => $request->category,

            'description' => $request->description,

            'file_url'    => $request->file_url,

            'status'      => $request->status
        ]);

        return redirect(
            '/admin/policies'
        );
    }

    public function edit($id)
    {
        $policy = Policy::findOrFail($id);

        return view(
            'admin.policies.edit',
            compact('policy')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $policy = Policy::findOrFail($id);

        $policy->update([

            'title'=>$request->title,

            'slug'=>Str::slug(
                $request->title
            ),

            'category'=>$request->category,

            'description'=>$request->description
        ]);

        return redirect(
            '/admin/policies'
        );
    }

    public function destroy($id)
    {
        Policy::findOrFail($id)->delete();

        return redirect(
            '/admin/policies'
        );
    }
}