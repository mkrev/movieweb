<?php

declare(strict_types=1);

namespace App\Core\Domain\Repositories;

interface MovieRepository
{
    /**
     * @return array<int, string>
     */
    public function getAll(): array;
}
