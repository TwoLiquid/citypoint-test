<?php

namespace App\Contracts\Controllers\Api\Guest\Car;

use Illuminate\Http\JsonResponse;

/**
 * Interface CarControllerInterface
 *
 * @package App\Contracts\Controllers\Api\Guest\Car
 */
interface CarControllerInterface
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse;
}
