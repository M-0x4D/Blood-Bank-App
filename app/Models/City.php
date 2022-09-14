<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governrate_id');


    // ! client ==> two relations

    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

    public function city_client()
    {
        return $this->belongsToMany('App\models\Client');
    }



    //! governrate ==> one relation

    public function governrate()
    {
        return $this->belongsTo('App\models\Governrate' , 'governrate_id');
    }


    //!donation ==> one relation

    public function donations()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

}