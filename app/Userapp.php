<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userapp extends Model
{
    public function signalements()
    {
        return $this->hasMany('App\Signalement');
    }
    
    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }


}
