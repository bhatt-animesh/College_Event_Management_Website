<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table='result';
    protected $fillable=['id','event_id','w_name','w_reg','r_name','r_reg'];

    public function events(){
        return $this->hasOne('App\events','id','event_id');
    }
}
