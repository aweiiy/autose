<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_body_type extends Model
{
    use HasFactory;
    protected $table = 'car_body_type';
    protected $fillable = ['id_car_model','name'];

    public function car_model()
    {
        return $this->belongsTo(car_model::class)->withDefault();
    }
}
