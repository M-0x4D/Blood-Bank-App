<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('is_read', 'client_id', 'notification_id');

}