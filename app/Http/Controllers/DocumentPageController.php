<?php

namespace App\Http\Controllers;

use App\Models\Document;

class DocumentPageController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();

        return view(
            'documents.index',
            compact('documents')
        );
    }
}
