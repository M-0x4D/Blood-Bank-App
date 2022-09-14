<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'category_id' , 'client_id');
  //  protected $appends = array('image_full_path' , 'is_favourite');

  //! category ==> one relation

    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }

    //! client  ==> two relations

    public function client()
    {
        return $this->belongsTo('App\models\Client');
    }

    public function post_client()
    {
        return $this->belongsToMany('App\models\Client');
    }

}