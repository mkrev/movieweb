<?php

namespace App\Core\Application\Providers;

use App\Core\Domain\Repositories\MovieRepository;
use App\Infrastructure\Repositories\ArrayMovieRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MovieRepository::class, ArrayMovieRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
