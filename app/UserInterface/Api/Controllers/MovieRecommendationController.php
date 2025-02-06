<?php

declare(strict_types=1);

namespace App\UserInterface\Api\Controllers;

use App\Core\Application\Queries\MovieRecommendationQuery;
use App\Core\Domain\Enums\RecommendationAlgorithm;
use App\UserInterface\Api\Requests\ListMovieRecommendationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OA;
use Throwable;

class MovieRecommendationController
{
    #[OA\Get(
        path: '/api/movie-recommendations',
        summary: 'Get movie recommendations',
        tags: ['Movie Recommendations'],
        parameters: [
            new OA\Parameter(
                name: 'algorithm',
                description: 'Recommendation algorithm',
                in: 'query',
                required: false,
                schema: new OA\Schema(
                    type: 'string',
                    enum: RecommendationAlgorithm::class
                ),
            ),
        ],
        responses: [
            new OA\Response(
                response: Response::HTTP_OK,
                description: 'List of movie recommendations',
                content: new OA\JsonContent(
                    type: 'array',
                    items: new OA\Items(type: 'string')
                )
            ),
        ]
    )]
    public function index(ListMovieRecommendationRequest $request, MovieRecommendationQuery $query): JsonResponse
    {
        try {
            $algorithm = $request->query('algorithm');
            $movieRecommendations = $query->get(is_string($algorithm) ? $algorithm : null);

            return response()->json($movieRecommendations);
        } catch (Throwable $e) {
            Log::error(__METHOD__ . PHP_EOL . $e);

            return response()->json(
                ['error' => __('Unexpected error.')],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
