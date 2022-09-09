<?php

namespace App\models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class Client extends Authenticable 
{

    

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'blood_type_id', 'password', 'date_of_birth', 'last_donation_date', 'name', 'pin_code', 'city_id' , 'api_token');

    public function bloodtype()
    {
        return $this->belongsTo('App\models\BloodType');
    }

    public function tokens()
    {
        return $this->hasMany('App\models\Token');
    }

    public function cities()
    {
        return $this->hasMany('App\models\City');
    }

    public function client_city()
    {
        return $this->belongsToMany('App\models\City');
    }

    public function client_donation()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    // public function client_donation_request()
    // {
    //     return $this->belongsTo('App\models\Client');
    // }

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

    protected $hidden = [
        'password',
        'api_token',
    ];

}