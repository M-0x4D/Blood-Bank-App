<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_requests_id');

    //! donation request  ==> one relation

    public function donation()
    {
        return $this->belongsTo('App\models\DonationRequest' , 'donation_requests_id');
    }
    
    
    //! notification  ==> one relation

    public function notification_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

}