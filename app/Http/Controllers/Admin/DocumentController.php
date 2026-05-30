<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();

        return view(
            'admin.documents.index',
            compact('documents')
        );
    }

    public function create()
    {
        return view(
            'admin.documents.create'
        );
    }

    public function store(Request $request)
    {
        $path = null;

        if($request->hasFile('file'))
        {
            $path = $request
                ->file('file')
                ->store(
                    'documents',
                    'public'
                );
        }

        Document::create([

            'title'=>$request->title,

            'slug'=>Str::slug(
                $request->title
            ),

            'file'=>$path,

            'type'=>$request->type
        ]);

        return redirect(
            '/admin/documents'
        );
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);

        return view(
            'admin.documents.edit',
            compact('document')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $document = Document::findOrFail($id);

        $path = $document->file;

        if($request->hasFile('file'))
        {
            $path = $request
                ->file('file')
                ->store(
                    'documents',
                    'public'
                );
        }

        $document->update([

            'title'=>$request->title,

            'slug'=>Str::slug(
                $request->title
            ),

            'file'=>$path,

            'type'=>$request->type
        ]);

        return redirect(
            '/admin/documents'
        );
    }

    public function destroy($id)
    {
        Document::findOrFail($id)->delete();

        return redirect(
            '/admin/documents'
        );
    }
}