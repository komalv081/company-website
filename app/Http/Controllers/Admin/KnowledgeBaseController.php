<?php

namespace App\Http\Controllers\Admin;
use Smalot\PdfParser\Parser;
use App\Http\Controllers\Controller;
use App\Models\KnowledgeBase;
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        $documents = KnowledgeBase::latest()->get();

        return view(
            'admin.knowledge-base.index',
            compact('documents')
        );
    }

    public function create()
    {
        return view(
            'admin.knowledge-base.create'
        );
    }
    public function store(Request $request)
    {
        $filePath = $request
            ->file('file')
            ->store(
                'knowledge-base',
                'public'
            );

        $parser = new Parser();

        $pdf = $parser->parseFile(
            storage_path(
                'app/public/' . $filePath
            )
        );

        $text = $pdf->getText();

        KnowledgeBase::create([

            'title' => $request->title,

            'file' => $filePath,

            'content' => $text

        ]);

        return redirect(
            '/admin/knowledge-base'
        );
    }
}