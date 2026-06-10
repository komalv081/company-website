<?php

namespace App\Services;

use App\Models\KnowledgeBaseChunk;

class KnowledgeBaseRetrievalService
{
   public function retrieve(string $question)
    {
        $keywords = explode(
            ' ',
            strtolower($question)
        );

        $query = KnowledgeBaseChunk::query()
            ->whereHas('knowledgeBase', function ($query) {
                $query->where('is_active', true)
                    ->where('processing_status', 'completed');
            });

        $query->where(function ($query) use ($keywords) {

            foreach ($keywords as $keyword) {

                if (strlen($keyword) > 3) {

                    $query->orWhere(
                        'content',
                        'LIKE',
                        "%{$keyword}%"
                    );

                }

            }

        });

        return $query
            ->with('knowledgeBase')
            ->limit(5)
            ->get();
    }
}
