<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;

class forum extends Model
{
    use Viewable;

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
    	return $this->morphMany('App\Comment','commentable');
    }
    
}
