<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsImages extends Model
{
    protected $table='events_images';
    protected $fillable=['events_id','image'];

}
