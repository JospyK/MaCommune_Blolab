<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function action_category()
    {
        return $this->belongsTo('App\ActionCategory');
    }
    
    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
