<?php

namespace App\Services;
use App\Models\KnowledgeBase;
use App\Models\KnowledgeBaseChunk;
//important ->manager
class KnowledgeBaseProcessingService
{
    public function __construct( protected ChunkingService $chunkingService)
    {
    }
    public function process(KnowledgeBase $knowledgeBase): int
    {
        $knowledgeBase->update([
            'processing_status' => 'processing',
            'error_message' => null,
        ]);

        try {

            $chunks = $this->chunkingService->chunk(
                $knowledgeBase->content
            );

            $knowledgeBase->chunks()->delete();

            foreach ($chunks as $chunk) {

                $knowledgeBase->chunks()->create([
                    'chunk_number' => $chunk['chunk_number'],
                    'page_number' => null,
                    'content' => $chunk['content'],
                ]);

            }

            $knowledgeBase->update([
                'processing_status' => 'completed',
                'chunk_count' => count($chunks),
            ]);

            return count($chunks);

        } catch (\Throwable $e) {

            $knowledgeBase->update([
                'processing_status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}
