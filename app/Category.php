<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function actualites()
    {
    	return $this->hasMany('App\Actualite');
    }
}
