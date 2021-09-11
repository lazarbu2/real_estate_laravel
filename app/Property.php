<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;



/**
 * App\Property
 *
 * @property int $id
 * @property int $property_type_id
 * @property int $transaction_id
 * @property int $parking_id
 * @property int $area
 * @property string $title
 * @property string $description
 * @property string $adress
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $floor
 * @property int $last_floor
 * @property int|null $newbuilt
 * @property string|null $note
 * @property float $price
 * @property float|null $lat
 * @property float|null $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PropertyImage[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereAdress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereLastFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereNewbuilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereParkingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property wherePropertyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Wishlist[] $wishlist
 * @property-read int|null $wishlist_count
 * @property int $location_id
 * @property int $structure_id
 * @property int $heating_id
 * @property int|null $furnitured
 * @property int|null $filed
 * @property-read \App\Heating $heating
 * @property-read \App\Location $location
 * @property-read \App\Parking $parking
 * @property-read \App\Structure $structure
 * @property-read \App\Transaction $transaction
 * @property-read \App\PropertyType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereFiled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereFurnitured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereHeatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereStructureId($value)
 * @property-read \App\PropertyType $property_type
 * @property string $featured_image
 * @property-read mixed $video_html
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereFeaturedImage($value)
 */

class Property extends Model
{

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function heating()
    {
        return $this->belongsTo(Heating::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }

    public  function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }



}
