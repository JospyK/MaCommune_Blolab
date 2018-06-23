<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function maires()
    {
        return $this->hasMany('App\Maire');
    }

    public function equipes()
    {
    	return $this->hasMany('App\Equipe');
    }

    public function actualites()
    {
    	return $this->hasMany('App\Actualite');
    }

    public function actions()
    {
    	return $this->hasMany('App\Action');
    }
}
