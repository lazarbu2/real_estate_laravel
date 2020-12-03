<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Heating
 *
 * @property-read \App\Property $property
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $property_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Heating whereUpdatedAt($value)
 */
class Heating extends Model
{
    protected $table = "heating";
    public  function property()
    {
        return $this->hasMany(Property::class);
    }
}
