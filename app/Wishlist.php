<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property;

/**
 * App\Wishlist
 *
 * @property-read \App\Property $property
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $property_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereUserId($value)
 */
class Wishlist extends Model
{
    protected $table = "wishlists";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function property()
    {
        return $this->belongsTo(Property::class);
    }
}
