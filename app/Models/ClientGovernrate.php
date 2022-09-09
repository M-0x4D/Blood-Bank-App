<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ClientGovernrate extends Model 
{

    protected $table = 'client_governrate';
    public $timestamps = true;
    protected $fillable = array('client_id', 'governrate_id');

}