<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    protected $table = 'knowledge_base';

    protected $fillable = [
        'title',
        'content',
        'file',
        'version',
        'is_active',
        'processing_status',
        'chunk_count',
        'error_message',
    ];
    public function chunks()
    {
        return $this->hasMany(KnowledgeBaseChunk::class);
    }
}
