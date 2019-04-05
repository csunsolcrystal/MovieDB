<?php

namespace App;

use App\Movie;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
	protected $table = 'directors';
    protected $primaryKey = 'id';
	
    public function movies() {
		return $this->belongsToMany('App\Movie', 'director_movie', 'MovieID', 'DirectorID');
    }
}
