<?php

namespace App;

use App\Movie;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	protected $table = 'actors';
    protected $primaryKey = 'id';
	
    public function movies() {
		
    return $this->belongsToMany('App\Movie', 'actor_movies', 'MovieID', 'actorID');
	}
}
