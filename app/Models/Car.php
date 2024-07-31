<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Car
 *
 * @property int $Id
 * @property string $RegNumber
 * @property string|null $VIN
 * @property string|null $Model
 * @property string|null $Brand
 * @method static \Illuminate\Database\Eloquent\Builder|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRegNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereVIN($value)
 * @mixin \Eloquent
 */
class Car extends Model
{
    /**
     * Database table name
     *
     * @var string
     */
    protected $table = 'Car';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'RegNumber', 'VIN', 'Model', 'Brand'
    ];
}
