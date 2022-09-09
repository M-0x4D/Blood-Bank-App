<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Governrate extends Model 
{

    protected $table = 'governrates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function citiesgov()
    {
        return $this->hasMany('App\models\City');
    }

    public function govclient()
    {
        return $this->belongsToMany('App\models\Client');
    }

}