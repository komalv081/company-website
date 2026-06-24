<?php

namespace App\Services;

use App\Models\KnowledgeBase;

class KnowledgeBaseEmbeddingService
{
    public function __construct(
        protected EmbeddingService $embeddingService
    ) {
    }

    public function process(
        KnowledgeBase $knowledgeBase
    ): int
    {
        $chunks = $knowledgeBase->chunks;

        $processedCount = 0;

        foreach ($chunks as $chunk) {

            $embedding = $this->embeddingService
                ->generate($chunk->content);

            $chunk->update([
                'embedding' => json_encode($embedding),
            ]);

            $processedCount++;
        }

        return $processedCount;
    }
}
