<?php

declare(strict_types=1);

use App\UserInterface\Api\Controllers\MovieRecommendationController;
use Illuminate\Support\Facades\Route;

Route::get('/movie-recommendations', [MovieRecommendationController::class, 'index']);
