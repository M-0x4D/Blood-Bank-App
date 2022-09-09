<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_requests_id');

    public function notification_donation()
    {
        return $this->belongsTo('App\models\DonationRequest');
    }

    public function notification_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

}