<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'blood_type_id', 'password', 'date_of_birth', 'last_donation_date', 'name', 'pin_code', 'city_id');

    public function bloodtype()
    {
        return $this->belongsTo('App\models\BloodType');
    }

    public function cities()
    {
        return $this->belongsTo('City');
    }

    public function client_donation()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    public function clientgov()
    {
        return $this->belongsToMany('App\models\Governrate');
    }

    public function clientbloodtype()
    {
        return $this->belongsToMany('App\models\BloodType');
    }

    public function clientnotification()
    {
        return $this->belongsToMany('App\models\Notification');
    }

    public function clientpost()
    {
        return $this->belongsToMany('App\models\Post');
    }

}