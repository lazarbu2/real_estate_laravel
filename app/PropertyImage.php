<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PropertyImage
 *
 * @property int $id
 * @property int $property_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Property $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyImage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Property $property
 */
class PropertyImage extends Model
{

    protected $table = "property_images";

    protected $fillable = [
        'image',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
