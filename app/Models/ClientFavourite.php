<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFavourite extends Model
{
    use HasFactory;

    protected $table = 'client_favourites';
    public $timestamps = true;
    protected $fillable = array('favourite_id', 'client_id');
}
