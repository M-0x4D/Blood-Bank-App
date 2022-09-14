<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Governrate extends Model 
{

    protected $table = 'governrates';
    public $timestamps = true;
    protected $fillable = array('name');

    //! city  ==> one relation

    public function cities()
    {
        return $this->hasMany('App\models\City');
    }

    //! client  ==> two relations

    public function governrate_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

}