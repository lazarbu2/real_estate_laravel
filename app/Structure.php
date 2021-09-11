<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Structure
 *
 * @property-read \App\Property $property
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $property_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Structure whereUpdatedAt($value)
 */
class Structure extends Model
{

    protected $table = "structure";

    public  function property()
    {
        return $this->hasMany(Property::class);
    }
}
