<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'car_listing_id'
    ];

    public function car_listing()
    {
        return $this->belongsTo(car_listing::class,'car_listing_id','id');
    }
}
