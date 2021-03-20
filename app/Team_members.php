<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_members extends Model
{
    protected $table='team_members';
    protected $fillable=['team_id','user_id'];
}
