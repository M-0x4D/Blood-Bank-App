<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityClient extends Model
{
    use HasFactory;
    protected $table = 'city_client';
    public $timestamps = true;
    protected $fillable = array('city_id', 'client_id');
}
