<?php

namespace App\Http\Controllers\Api\Guest;

use App\Contracts\Controllers\Api\Guest\Car\CarControllerInterface;
use App\Contracts\Repositories\Car\CarRepositoryInterface;
use App\Http\Controllers\Api\BaseController;
use App\Transformers\Api\Guest\Car\CarPageTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class CarController
 *
 * @package App\Http\Controllers\Api\Guest
 */
final class CarController extends BaseController implements CarControllerInterface
{
    /**
     * CarController constructor
     *
     * @param CarRepositoryInterface $carRepository
     */
    public function __construct(protected CarRepositoryInterface $carRepository) {}

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cars = $this->carRepository->getAll();

        return $this->respondWithSuccess(
            current($this->transformItem($cars, new CarPageTransformer($cars))),
            trans('validation/api/guest/car/index.result.success')
        );
    }
}
