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
    protected $fillable = ['user_id', 'car_make_id', 'car_model_id', 'car_body_type_id','city_id','fuel_type_id', 'cubic_capacity', 'battery_capacity', 'transmission_id','description', 'year', 'mileage', 'vin' , 'price', 'phone_number', 'email','image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(image::class);
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
    public function city()
    {
        return $this->belongsTo(city::class);
    }
    public function fuel_type()
    {
        return $this->belongsTo(fuel_type::class);
    }
    public function transmission()
    {
        return $this->belongsTo(transmission::class);
    }

}
