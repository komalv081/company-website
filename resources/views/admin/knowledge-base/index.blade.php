<h1>Knowledge Base</h1>

<a href="/admin/knowledge-base/create">
    Upload PDF
</a>

<hr>

@foreach($documents as $document)

    <p>{{ $document->title }}</p>

@endforeach