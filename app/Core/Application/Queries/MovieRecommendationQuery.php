<?php

declare(strict_types=1);

namespace App\Core\Application\Queries;

use App\Core\Application\DTOs\MovieRecommendationsDto;
use App\Core\Domain\Enums\RecommendationAlgorithm;
use App\Core\Domain\Factories\RecommendationAlgorithmFactory;
use App\Core\Domain\Repositories\MovieRepository;

class MovieRecommendationQuery
{
    public function __construct(
        readonly private MovieRepository $movieRepository,
        readonly private RecommendationAlgorithmFactory $recommendationAlgorithmFactory
    ) {
    }

    public function get(?string $algorithm): MovieRecommendationsDto
    {
        $movies = $this->movieRepository->getAll();
        $recommendationAlgorithm = $this->recommendationAlgorithmFactory->create($this->getAlgorithm($algorithm));

        return new MovieRecommendationsDto($recommendationAlgorithm->recommend($movies));
    }

    private function getAlgorithm(?string $algorithm): RecommendationAlgorithm
    {
        if ($algorithm === null) {
            return RecommendationAlgorithm::Random;
        }

        return RecommendationAlgorithm::from($algorithm);
    }
}
