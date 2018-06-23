<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionCommunale extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }
}
