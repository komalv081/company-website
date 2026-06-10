<?php

namespace App\Services;

class ChunkingService
{
    public function chunk(string $text): array
    {
        $chunkSize = 1000;
        $overlap = 200;
        $step = $chunkSize - $overlap;

        $textLength = mb_strlen($text);

        $chunks = [];

        $chunkNumber = 1;
        $start = 0;

        while ($start < $textLength) {

            $chunk = mb_substr($text, $start, $chunkSize);

            $chunks[] = [
                'chunk_number' => $chunkNumber,
                'content' => $chunk,
            ];

            $chunkNumber++;
            $start += $step;
        }

        return $chunks;
    }
}
