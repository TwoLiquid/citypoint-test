<?php

use App\Contracts\Repositories\Car\CarRepositoryInterface;
use App\Repositories\Car\CarRepository;

return [

    /*
    |--------------------------------------------------------------------------
    | Repository Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default repository parameters.
    |
    */

    'default' => [
        'cacheTime' => env('REPOSITORY_CACHE_TIME', 0),
        'perPage'   => env('REPOSITORY_PER_PAGE', 18),
    ],

    /*
    |--------------------------------------------------------------------------
    | Service provider boot drivers
    |--------------------------------------------------------------------------
    |
    | This option controls service providers instances and concrete data
    |
    */

    'boot' => [
        CarRepositoryInterface::class => CarRepository::class
    ]

];
