<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maire extends Model
{
    public function commune()
    {
    	return $this->belongsTo('App\Commune');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
