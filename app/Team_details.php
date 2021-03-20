<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_details extends Model
{
    protected $table='team_details';
    protected $fillable=['team_id','team_name','team_leader_id','team_size','team_department','hod_id','dr_name','dr_contact_number'];
}
