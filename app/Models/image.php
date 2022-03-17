<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = ['car_listing_id', 'name'];

    public function car_listing()
    {
        return $this->belongsTo(car_listing::class)->withDefault();
    }
}
