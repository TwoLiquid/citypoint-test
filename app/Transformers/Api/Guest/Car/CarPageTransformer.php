<?php

namespace App\Transformers\Api\Guest\Car;

use App\Transformers\BaseTransformer;
use League\Fractal\Resource\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * Class CarPageTransformer
 *
 * @package App\Transformers\Api\Guest\Car
 */
class CarPageTransformer extends BaseTransformer
{
    /**
     * @var EloquentCollection
     */
    protected EloquentCollection $cars;

    /**
     * @var array
     */
    protected array $defaultIncludes = [
        'data'
    ];

    /**
     * CarPageTransformer constructor
     *
     * @param EloquentCollection $cars
     */
    public function __construct(EloquentCollection $cars)
    {
        /** @var EloquentCollection cars */
        $this->cars = $cars;
    }

    /**
     * @return array
     */
    public function transform() : array
    {
        return [
            'meta' => [
                'total_count' => $this->cars->count()
            ]
        ];
    }

    /**
     * @return Collection
     */
    public function includeData() : Collection
    {
        return $this->collection($this->cars, new CarTransformer);
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'car_page';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'car_pages';
    }
}
