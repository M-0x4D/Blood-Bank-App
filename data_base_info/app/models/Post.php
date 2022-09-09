<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'category_id');

    public function postcat()
    {
        return $this->belongsTo('App\models\Category');
    }

    public function post_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

}