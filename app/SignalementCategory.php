<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignalementCategory extends Model
{
    public function signalements()
    {
    	return $this->hasMany('App\Signalement');
    }
}
