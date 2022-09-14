<?php

namespace App\Models;

use App\models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = 'favourites';
    public $timestamps = true;
    protected $fillable = array('client_id' , 'post_id');



    //! client  ==> one relation

public function favourite_client()
    {
        return $this->belongsToMany('App\models\Client');
    } 

}
