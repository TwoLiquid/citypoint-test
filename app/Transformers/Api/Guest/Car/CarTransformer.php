<?php

namespace App\Transformers\Api\Guest\Car;

use App\Models\Car;
use App\Transformers\BaseTransformer;

/**
 * Class CarTransformer
 *
 * @package App\Transformers\Api\Guest\Car
 */
class CarTransformer extends BaseTransformer
{
    /**
     * @param Car $car
     *
     * @return array
     */
    public function transform(Car $car) : array
    {
        return [
            'Id'        => $car->Id,
            'RegNumber' => $car->RegNumber,
            'VIN'       => $car->VIN,
            'Model'     => $car->Model,
        ];
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'car';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'cars';
    }
}
