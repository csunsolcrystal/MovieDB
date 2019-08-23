<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Actor;
use App\Director;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$movies = Movie::with('awards')->get();
    $actors = Actor::with('movies')->get();

		foreach($movies as $movie) {
			foreach($movie->awards as $award) {
				if($award->NumWinOscars > 0)
		$newmovies[] = $movie;
		}
      }

		usort($newmovies,function(Movie $movie, Movie $movie2){
			foreach($movie->awards as $award) {
				foreach($movie2->awards as $award2) {
    return $award->NumWinOscars < $award2->NumWinOscars;
		}
	}
});

// get random Movie & random actor
if(sizeof($movies) > 0) {
$randomNumber = rand(0, sizeof($movies)-1);
$randomNumber2 = rand(0, sizeof($actors)-1);

$randomMovie = $movies->get($randomNumber);
$randomActor = $actors->get($randomNumber2);
}
	$movies = array_slice($newmovies, 0, 6);

  if(sizeof($movies) > 0)
  return view('welcome', [
	'movies' => $movies,
	'randomMovie' => $randomMovie,
  'randomActor' => $randomActor,
	]);
  else
    return view('welcome', [
  	'movies' => $movies,
  	]);
    }

	public function all() {
		$movies = Movie::orderBy('title', 'asc')->get();
		return view('movies.index', compact('movies'));
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
