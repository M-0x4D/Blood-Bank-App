<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'city_id', 'hospital_name', 'blood_type_id', 'patient_age', 'bags_num', 'hospital_address', 'details', 'latitude', 'longitude', 'client_id');

    //! city  ==> one relation

    public function city()
    {
        return $this->belongsTo('App\models\City' , 'city_id');
    }


    //! bloodtype  ==> one relation

    public function bloodtype()
    {
        return $this->belongsTo('App\models\BloodType');
    }


    //! client  ==> one relation
    
    public function client()
    {
        return $this->belongsTo('App\models\Client');
    }
    

    //! notification  ==> one relation 
    

    public function notifications()
    {
        return $this->hasMany('App\models\Notification' , 'id');
    }

}