<?php

namespace App\models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class Client extends Authenticable 
{


    use HasRoles;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'blood_type_id', 'password', 'date_of_birth', 'last_donation_date', 'name', 'pin_code', 'city_id' , 'api_token' , 'governrate_id');

   //! token  ==> one relation

    public function tokens()
    {
        return $this->hasMany('App\models\Token');
    }

    //! city  ==> tow relations

    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function client_city()
    {
        return $this->belongsToMany('App\models\City');
    }


    //! donation ==> one relation

    public function donations()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    //! governrate ==> tow relations

    public function client_governrate()
    {
        return $this->belongsToMany('App\models\Governrate');
    }

    public function governrate()
    {
        return $this->belongsTo('App\models\Governrate' , 'governrate_id');
    }



    //! bloodtype ==> two relations

    public function bloodtype()
    {
        return $this->belongsTo('App\models\BloodType' , 'blood_type_id');
    }

    public function client_bloodtype()
    {
        return $this->belongsToMany('App\models\BloodType');
    }

    //! notification ==> one relation

    public function client_notification()
    {
        return $this->belongsToMany('App\models\Notification');
    }

    //! post  ==> two relations

    public function posts()
    {
        return $this->hasMany('App\models\Post');
    }

    public function client_post()
    {
        return $this->belongsToMany('App\models\Post');
    }


    //! Favourite ==> one relation
    
    public function client_favourite()
    {
        return $this->belongsToMany('App\models\Favourite');
    } 


    //! role ==> one relation

    public function client_role()
    {
        return $this->belongsToMany('App\models\Role' , 'model_has_roles' , 'model_id');
    } 


    //! permission ==> one relation

    public function client_permisson()
    {
        return $this->belongsToMany('App\models\Permission' , 'model_has_permissions' , 'model_id');
    } 




    protected $hidden = [
        'password',
        'api_token',
    ];

}