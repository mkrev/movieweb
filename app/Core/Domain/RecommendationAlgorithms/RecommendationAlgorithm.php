<?php

declare(strict_types=1);

namespace App\Core\Domain\RecommendationAlgorithms;

interface RecommendationAlgorithm
{
    /**
     * @param array<int, string> $movies
     *
     * @return array<int, string>
     */
    public function recommend(array $movies): array;
}
