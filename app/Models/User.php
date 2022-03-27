<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\car_listing;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function car_listing(): HasMany
    {
        return $this->hasMany(\App\Models\car_listing::class,'user_id','id');
    }


    public function wishlists(){
        return $this->hasMany(wishlist::class);
    }

    public static function name() {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return $data->name;
    }
    public static function logged() {
        if(Session::has('loginId')){
            return true;
        }else false;

    }
    public static function data() {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return $data;
    }

}
