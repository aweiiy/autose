<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function car_listing()
    {
        return $this->belongsToMany(car_listing::class, 'car_listing', 'owner_id');
    }
}
