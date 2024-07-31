<?php

namespace App\Repositories\Car;

use App\Contracts\Repositories\Car\CarRepositoryInterface;
use App\Exceptions\Repository\RepositoryException;
use App\Models\Car;
use App\Repositories\BaseRepository;
use App\Support\Repository\ExceptionTrait;
use App\Support\Repository\InitializeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Exception;

/**
 * Class CarRepository
 *
 * @package App\Repositories\Car
 */
class CarRepository extends BaseRepository implements CarRepositoryInterface
{
    use InitializeTrait, ExceptionTrait;

    /**
     * @param int|null $id
     *
     * @return Car|null
     *
     * @throws RepositoryException
     */
    public function findById(?int $id): ?Car
    {
        try {
            return Car::find($id);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @return Collection
     *
     * @throws RepositoryException
     */
    public function getAll(): Collection
    {
        try {
            return Car::all();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     *
     * @throws RepositoryException
     */
    public function getAllPaginated(
        ?int $page = null,
        ?int $perPage = null
    ): LengthAwarePaginator {
        try {
            return Car::query()
                ->paginate($perPage ?: $this->perPage, ['*'], 'page', $page);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }
}
