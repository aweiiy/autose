<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class car_body_type extends Model
{
    use HasFactory;
    protected $table = 'car_body_type';
    protected $fillable = ['name'];

    public function car_listing(): HasMany
    {
        return $this->hasMany(\App\Models\car_listing::class);
    }
}
