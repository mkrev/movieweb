<?php

declare(strict_types=1);

namespace App\Core\Application\DTOs;

use JsonSerializable;

readonly class MovieRecommendationsDto implements JsonSerializable
{
    /**
     * @param array<string> $movieRecommendations
     */
    public function __construct(
        public array $movieRecommendations
    ) {
    }

    /**
     * @return array<string>
     */
    public function jsonSerialize(): array
    {
        return $this->movieRecommendations;
    }
}
