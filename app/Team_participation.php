<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_participation extends Model
{
    protected $table='team_participation';
    protected $fillable=['team_id','event_id'];
}
