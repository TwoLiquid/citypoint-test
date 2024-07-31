<?php

namespace App\Contracts\Repositories\Car;

use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CarRepositoryInterface
 */
interface CarRepositoryInterface
{
    /**
     * @param int|null $id
     *
     * @return Car|null
     */
    public function findById(?int $id): ?Car;

    /**
     * @return Collection
     */
    public function getAll() : Collection;

    /**
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(?int $page, ?int $perPage): LengthAwarePaginator;
}
