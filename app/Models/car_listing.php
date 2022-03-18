<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class car_listing extends Model
{
    use HasFactory;
    protected $table = 'car_listing';
    protected $fillable = ['owner_id', 'id_car_make', 'id_car_model', 'id_car_body_type','description', 'year', 'price', 'phone_number', 'email','image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function car_make()
    {
        return $this->belongsTo(car_make::class, 'id_car_make');
    }

}
