<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    

    //! donation request  ==> one relation

    public function donations()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    //! client  ==> two relations

    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

    public function boodtype_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

}