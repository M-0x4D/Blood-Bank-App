<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'city_id', 'hospital_name', 'blood_type_id', 'patient_age', 'bags_num', 'hospital_address', 'details', 'latitude', 'longitude', 'client_id');

    public function donationcities()
    {
        return $this->belongsTo('App\models\City');
    }

    public function donation_bloodtypes()
    {
        return $this->belongsTo('App\models\BloodType');
    }

    public function donation_client()
    {
        return $this->belongsTo('App\models\Client');
    }

    public function donation_notification()
    {
        return $this->hasMany('App\models\Notification');
    }

}