<?php

namespace Tests\Feature;

use App\Core\Application\Queries\MovieRecommendationQuery;
use Exception;
use Illuminate\Http\Response;
use Tests\TestCase;

class MovieRecommendationsTest extends TestCase
{
    public function testApplicationReturnsSuccessfulResponse(): void
    {
        $response = $this->getJson('/api/movie-recommendations');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testApplicationReturnsRecommendationsWithAlgorithm(): void
    {
        $response = $this->getJson('/api/movie-recommendations?algorithm=ManyWords');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testApplicationReturnsErrorForInvalidAlgorithm(): void
    {
        $response = $this->getJson('/api/movie-recommendations?algorithm=InvalidAlgorithm');

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testApplicationHandlesUnexpectedError(): void
    {
        $this->mock(MovieRecommendationQuery::class, function ($mock) {
            $mock->shouldReceive('get')->andThrow(new Exception('Unexpected error.'));
        });

        $response = $this->getJson('/api/movie-recommendations');

        $response->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR);
        $response->assertJson(['error' => 'Unexpected error.']);
    }
}
