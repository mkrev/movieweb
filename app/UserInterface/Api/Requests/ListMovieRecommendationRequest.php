<?php

declare(strict_types=1);

namespace App\UserInterface\Api\Requests;

use App\Core\Domain\Enums\RecommendationAlgorithm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListMovieRecommendationRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'algorithm' => ['nullable', Rule::enum(RecommendationAlgorithm::class)],
        ];
    }
}
