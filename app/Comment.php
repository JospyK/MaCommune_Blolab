<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function userapp()
    {
    	return $this->belongsTo('App\Userapp');
    }

    public function action()
    {
    	return $this->belongsTo('App\Action');
    }
}
