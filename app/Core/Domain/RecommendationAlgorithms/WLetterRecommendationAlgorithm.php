<?php

declare(strict_types=1);

namespace App\Core\Domain\RecommendationAlgorithms;

class WLetterRecommendationAlgorithm implements RecommendationAlgorithm
{
    public function recommend(array $movies): array
    {
        return array_values(array_filter(array_unique($movies), function (string $movie): bool {
            return str_starts_with($movie, 'W') && iconv_strlen((string) preg_replace('/\s+/', '', $movie)) % 2 === 0;
        }));
    }
}
