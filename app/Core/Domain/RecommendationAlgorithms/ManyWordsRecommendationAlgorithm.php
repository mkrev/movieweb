<?php

declare(strict_types=1);

namespace App\Core\Domain\RecommendationAlgorithms;

class ManyWordsRecommendationAlgorithm implements RecommendationAlgorithm
{
    public function recommend(array $movies): array
    {
        $diacritics = 'ąĄćĆęĘłŁńŃóÓśŚźŹżŻ';

        return array_values(array_filter(array_unique($movies), function (string $movie) use ($diacritics): bool {
            return str_word_count($movie, 0, $diacritics) > 1;
        }));
    }
}
