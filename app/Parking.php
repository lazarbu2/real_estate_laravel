<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Parking
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking query()
 * @mixin \Eloquent
 * @property-read \App\Property $property
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $property_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parking whereUpdatedAt($value)
 */
class Parking extends Model
{

    protected $table = "parking";

    public  function property()
    {
        return $this->hasMany(Property::class);
    }
}
