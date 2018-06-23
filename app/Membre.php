<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }
}
