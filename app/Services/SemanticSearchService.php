<?php

namespace App\Services;

use App\Models\KnowledgeBaseChunk;

class SemanticSearchService
{
    public function __construct(
        protected EmbeddingService $embeddingService
    ) {
    }

    private function cosineSimilarity(
        array $vectorA,
        array $vectorB
    ): float
    {
        $dotProduct = 0;
        $magnitudeA = 0;
        $magnitudeB = 0;

        foreach ($vectorA as $index => $value) {

            $dotProduct += $value * $vectorB[$index];

            $magnitudeA += $value * $value;

            $magnitudeB += $vectorB[$index] * $vectorB[$index];
        }

        $magnitudeA = sqrt($magnitudeA);
        $magnitudeB = sqrt($magnitudeB);

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0;
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }
    public function search(string $question): array
    {
        $questionEmbedding = $this->embeddingService
            ->generate($question);

        $results = [];

        $chunks = KnowledgeBaseChunk::query()
            ->whereNotNull('embedding')
            ->with('knowledgeBase')
            ->get();

        foreach ($chunks as $chunk) {

            $chunkEmbedding = json_decode(
                $chunk->embedding,
                true
            );

            $score = $this->cosineSimilarity(
                $questionEmbedding,
                $chunkEmbedding
            );

            $results[] = [
                'chunk' => $chunk,
                'score' => $score,
            ];
        }

        usort($results, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return array_slice($results, 0, 5);
    }
}
