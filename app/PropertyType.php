<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PropertyType
 *
 * @property-read \App\Property $property
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $property_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereUpdatedAt($value)
 */
class PropertyType extends Model
{
    protected $table = "property_type";

    public  function property()
    {
        return $this->hasMany(Property::class);
    }
}
