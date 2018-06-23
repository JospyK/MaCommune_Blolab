<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    public function membres()
    {
        return $this->hasMany('App\Membre');
    }

    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }
}
