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
    protected $fillable = ['user_id', 'car_make_id', 'car_model_id', 'car_body_type_id','description', 'year', 'price', 'phone_number', 'email','image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car_make()
    {
        return $this->belongsTo(car_make::class);
    }
    public function car_model()
    {
        return $this->belongsTo(car_model::class);
    }
    public function car_body_type()
    {
        return $this->belongsTo(car_body_type::class);
    }

}
