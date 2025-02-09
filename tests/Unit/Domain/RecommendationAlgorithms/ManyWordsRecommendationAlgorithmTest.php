<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\RecommendationAlgorithms;

use App\Core\Domain\RecommendationAlgorithms\ManyWordsRecommendationAlgorithm;
use Tests\TestCase;

class ManyWordsRecommendationAlgorithmTest extends TestCase
{
    private ManyWordsRecommendationAlgorithm $algorithm;

    protected function setUp(): void
    {
        $this->algorithm = new ManyWordsRecommendationAlgorithm();
    }

    public function testRecommendReturnsMoviesWithMultipleWords(): void
    {
        $movies = ['The Matrix', 'Inception', 'Up', 'Toy Story'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEquals(['The Matrix', 'Toy Story'], $result);
    }

    public function testRecommendReturnsEmptyArrayWhenNoMoviesWithMultipleWords(): void
    {
        $movies = ['Up', 'It', 'Her'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEmpty($result);
    }

    public function testRecommendHandlesMoviesWithDiacritics(): void
    {
        $movies = ['Zażółć gęślą jaźń', 'Inception', 'Łódź', 'Toy Story'];

        $result = $this->algorithm->recommend($movies);


        $this->assertEquals(['Zażółć gęślą jaźń', 'Toy Story'], $result);
    }

    public function testRecommendHandlesMoviesWithDuplicates(): void
    {
        $movies = ['The Matrix', 'Inception', 'Up', 'Toy Story', 'The Matrix'];

        $result = $this->algorithm->recommend($movies);

        $this->assertEquals(['The Matrix', 'Toy Story'], $result);
    }

    public function testRecommendReturnsEmptyArrayWhenInputIsEmpty(): void
    {
        $movies = [];

        $result = $this->algorithm->recommend($movies);

        $this->assertEmpty($result);
    }
}
