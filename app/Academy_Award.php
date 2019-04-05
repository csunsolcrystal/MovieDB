<?php

namespace App;

use App\Movie;
use Illuminate\Database\Eloquent\Model;

class Academy_Award extends Model
{
	protected $table = 'academy_awards';
    protected $primaryKey = 'AcademyID';
	
    public function movies() {
		
    return $this->belongsToMany('App\Movie', 'academy_award_movies', 'MovieID', 'AcademyID');
	}
}
