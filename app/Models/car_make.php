<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_make extends Model
{
    use HasFactory;
    protected $table = 'car_make';
    protected $fillable = ['name'];


    public function car_model()
    {
        return $this->hasMany(car_model::class);
    }
}
