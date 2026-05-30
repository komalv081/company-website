<?php

namespace App\Http\Controllers\Api;

use App\Models\Document;

class DocumentController extends Controller
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
