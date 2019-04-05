<?php

namespace App;

use App\Director;
use App\Actor;
use App\Academy_Award;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $table = 'movies';
    protected $primaryKey = 'MovieID';
	
    public function directors() {
		
    return $this->belongsToMany('App\Director', 'director_movie', 'MovieID', 'DirectorID');
	
	}

	public function actors() {
		
    return $this->belongsToMany('App\Actor', 'actor_movies', 'MovieID', 'actorID');
	
	}
	
	public function awards() {
		
    return $this->belongsToMany('App\Academy_Award', 'academy_award_movies', 'MovieID', 'AcademyID');
	}
}
