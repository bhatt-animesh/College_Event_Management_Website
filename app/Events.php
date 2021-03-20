<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table='events';
    protected $fillable=['e_name','e_venue','e_date','e_time','e_type','e_category','e_team_size','e_gender','e_parti','e_c_name','e_c_contact','e_description','e_rules','e_guidlines','e_jud_cri','e_prize'];

    public function category(){
        return $this->hasOne('App\Category','id','e_category');
    }

}
