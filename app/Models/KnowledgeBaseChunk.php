<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseChunk extends Model
{
    protected $table = 'knowledge_base_chunks';

    protected $fillable = [
        'knowledge_base_id',
        'chunk_number',
        'page_number',
        'content',
    ];

    public function knowledgeBase()
    {
        return $this->belongsTo(KnowledgeBase::class);
    }

}
