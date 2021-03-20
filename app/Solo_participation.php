<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solo_participation extends Model
{
    protected $table='solo_participation';
    protected $fillable=['id','event_id','user_id'];

    public function events(){
        return $this->hasOne('App\Events','id','event_id');
    }
}
