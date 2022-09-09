<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'category_id' , 'client_id');
  //  protected $appends = array('image_full_path' , 'is_favourite');

    public function postcat()
    {
        return $this->belongsTo('App\models\Category');
    }

    public function post_client()
    {
        return $this->belongsTo('App\models\Client');
    }

}