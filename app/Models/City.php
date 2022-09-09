<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governrate_id');


    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

    public function city_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

    public function govcities()
    {
        return $this->belongsTo('App\models\Governrate');
    }

    public function citiesdonation()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

}