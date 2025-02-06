<?php

namespace Tests\Unit\Domain\RecommendationAlgorithms;

use App\Core\Domain\RecommendationAlgorithms\WLetterRecommendationAlgorithm;
use Tests\TestCase;

class WLetterRecommendationAlgorithmTest extends TestCase
{
    private WLetterRecommendationAlgorithm $algorithm;

    protected function setUp(): void
    {
        $this->algorithm = new WLetterRecommendationAlgorithm();
    }

    public function testRecommendReturnsMoviesStartingWithWAndEvenLength(): void
    {
        $movies = ['Wonder Woman', 'WALL-E', 'W', 'Wolverine'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEquals(['WALL-E'], $result);
    }

    public function testRecommendReturnsEmptyArrayWhenNoMoviesStartingWithW(): void
    {
        $movies = ['The Matrix', 'Inception', 'Toy Story'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEmpty($result);
    }

    public function testRecommendReturnsEmptyArrayWhenNoMoviesWithEvenLength(): void
    {
        $movies = ['W', 'Wolverine'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEmpty($result);
    }

    public function testRecommendHandlesMoviesWithDiacritics(): void
    {
        $movies = ['Wojna Światów', 'W', 'Wolverine'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEquals(['Wojna Światów'], $result);
    }


    public function testRecommendHandlesMoviesWithDuplicates(): void
    {
        $movies = ['WALL-E', 'Inception', 'W', 'Wolverine', 'WALL-E'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEquals(['WALL-E'], $result);
    }

    public function testRecommendReturnsEmptyArrayWhenInputIsEmpty(): void
    {
        $movies = [];

        $result = $this->algorithm->recommend($movies);

        $this->assertEmpty($result);
    }
}
