<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class EmbeddingService
{
    public function generate(string $text): array
    {
        $response = OpenAI::embeddings()->create([

            'model' => 'text-embedding-3-small',

            'input' => $text,

        ]);

        return $response->embeddings[0]->embedding;
    }
}
