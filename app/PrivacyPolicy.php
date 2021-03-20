<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    protected $table='privacypolicy';
    protected $fillable=['privacypolicy_content'];
}
