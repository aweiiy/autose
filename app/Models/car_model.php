<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_model extends Model
{
    use HasFactory;
    protected $table = 'car_model';
    protected $fillable = ['id_car_make','name','year'];

    public function car_make()
    {
        return $this->belongsTo(car_make::class)->withDefault();
    }

    public function car_body_type()
    {
        return $this->hasMany(car_body_type::class);
    }
}
