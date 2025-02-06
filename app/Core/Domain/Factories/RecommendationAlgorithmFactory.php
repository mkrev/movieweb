<?php

declare(strict_types=1);

namespace App\Core\Domain\Factories;

use App\Core\Domain\Enums\RecommendationAlgorithm as RecommendationAlgorithmEnum;
use App\Core\Domain\RecommendationAlgorithms\ManyWordsRecommendationAlgorithm;
use App\Core\Domain\RecommendationAlgorithms\RandomRecommendationAlgorithm;
use App\Core\Domain\RecommendationAlgorithms\RecommendationAlgorithm;
use App\Core\Domain\RecommendationAlgorithms\WLetterRecommendationAlgorithm;

class RecommendationAlgorithmFactory
{
    public function create(RecommendationAlgorithmEnum $strategy): RecommendationAlgorithm
    {
        return match ($strategy) {
            RecommendationAlgorithmEnum::ManyWords => new ManyWordsRecommendationAlgorithm(),
            RecommendationAlgorithmEnum::Random => new RandomRecommendationAlgorithm(),
            RecommendationAlgorithmEnum::WLetter => new WLetterRecommendationAlgorithm(),
        };
    }
}
