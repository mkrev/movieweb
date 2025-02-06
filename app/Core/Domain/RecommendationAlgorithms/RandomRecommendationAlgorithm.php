<?php

declare(strict_types=1);

namespace App\Core\Domain\RecommendationAlgorithms;

class RandomRecommendationAlgorithm implements RecommendationAlgorithm
{
    public function recommend(array $movies): array
    {
        if (count($movies) < 3) {
            return $movies;
        }

        $randomKeys = array_rand(array_unique($movies), 3);

        return array_values(array_map(fn ($key) => $movies[$key], $randomKeys));
    }
}
