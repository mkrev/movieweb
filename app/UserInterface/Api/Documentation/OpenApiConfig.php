<?php

declare(strict_types=1);

namespace App\UserInterface\Api\Documentation;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Movieweb API',
    description: 'API for search movie recommendations'
)]
class OpenApiConfig
{
}
