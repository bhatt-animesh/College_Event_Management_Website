<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table='gallery';
    protected $fillable=['id','profile_image','day'];
}
