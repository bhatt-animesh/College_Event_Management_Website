<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ourteam extends Model
{
    protected $table='ourteam';
    protected $fillable=['id','name','image','committee_name','mobile','info'];
}
