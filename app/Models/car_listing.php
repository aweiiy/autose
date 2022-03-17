<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_listing extends Model
{
    use HasFactory;
    protected $table = 'car_listing';
    protected $fillable = ['owner_id', 'id_car_make', 'id_car_model', 'id_car_body_type', 'price', 'phone_number', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
