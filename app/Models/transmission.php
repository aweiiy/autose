<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transmission extends Model
{
    use HasFactory;
    protected $table = 'transmissions';
    protected $fillable = ['name'];
}
