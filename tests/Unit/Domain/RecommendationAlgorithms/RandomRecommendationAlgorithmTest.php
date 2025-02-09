<?php

namespace Tests\Unit\Domain\RecommendationAlgorithms;

use App\Core\Domain\RecommendationAlgorithms\RandomRecommendationAlgorithm;
use Tests\TestCase;

class RandomRecommendationAlgorithmTest extends TestCase
{
    private RandomRecommendationAlgorithm $algorithm;

    protected function setUp(): void
    {
        $this->algorithm = new RandomRecommendationAlgorithm();
    }

    public function testRecommendReturnsThreeRandomMovies(): void
    {
        $movies = ['The Matrix', 'Inception', 'Up', 'Toy Story', 'Avatar'];

        $result = $this->algorithm->recommend($movies);

        $this->assertCount(3, $result);
    }

    public function testRecommendReturnsAllMoviesWhenLessThanThree(): void
    {
        $movies = ['The Matrix', 'Inception'];

        $result = $this->algorithm->recommend($movies);

        $this->assertCount(2, $result);
        $this->assertEquals($movies, $result);
    }

    public function testRecommendReturnsEmptyArrayWhenNoMovies(): void
    {
        $movies = [];

        $result = $this->algorithm->recommend($movies);

        $this->assertEmpty($result);
    }

    public function testRecommendHandlesMoviesWithDiacritics(): void
    {
        $movies = ['Zażółć gęślą jaźń', 'Łódź', 'Toy Story', 'Inception', 'Avatar'];

        $result = $this->algorithm->recommend($movies);

        $this->assertCount(3, $result);
    }

    public function testRecommendHandlesMoviesWithDuplicates(): void
    {
        $movies = ['The Matrix', 'Inception', 'Up', 'Toy Story', 'The Matrix'];

        $result = $this->algorithm->recommend($movies);

        $this->assertCount(3, $result);
    }
}
