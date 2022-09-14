<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');

    //! post ==> one relation 
    
    public function posts()
    {
        return $this->hasMany('App\models\Post');
    }

}