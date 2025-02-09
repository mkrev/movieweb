<?php

declare(strict_types=1);

namespace App\Core\Domain\Enums;

enum RecommendationAlgorithm: string
{
    case WLetter = 'WLetter';
    case ManyWords = 'ManyWords';
    case Random = 'Random';
}
