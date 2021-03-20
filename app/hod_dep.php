<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hod_dep extends Model
{
    protected $table='hod_dep';
    protected $fillable=['id','user_id','department_name','dr_name','dr_con','cr_name','cr_con'];

    public function User(){
        return $this->hasOne('App\User','id','user_id');
    }

}
