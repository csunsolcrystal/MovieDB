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

  // get poster images for Movies
  //https://api.themoviedb.org/3/search/movie?api_key=15d2ea6d0dc1d476efbca3eba2b9bbfb&query=the+godfather

  // store image urls into a key-pair for each top movie

  foreach ($movies as $movie) {
      $url = "https://api.themoviedb.org/3/search/movie?api_key=15d2ea6d0dc1d476efbca3eba2b9bbfb&query=" . urlencode($movie->Title) . "";
  		$data = file_get_contents($url);
  		$posterUrls = json_decode($data, true);
      $posterUrls = $posterUrls['results'][0]['poster_path'];
      $posterImages[$movie->Title] = $posterUrls;
  }
      // get random movie info
      $url = "https://api.themoviedb.org/3/search/movie?api_key=15d2ea6d0dc1d476efbca3eba2b9bbfb&query=" . urlencode($randomMovie->Title) . "";
  		$data = file_get_contents($url);
  		$data = json_decode($data, true);
      $posterUrls = $data['results'][0]['poster_path'];
      $summary = $data['results'][0]['overview'];
      $randomMoviePoster = $posterUrls;


      // get basic random person info
      $personUrl = "https://api.themoviedb.org/3/search/person?api_key=15d2ea6d0dc1d476efbca3eba2b9bbfb&language=en-US&page=1&include_adult=false&query=" . urlencode($randomActor->Name) . "";
      $data = file_get_contents($personUrl);
      $data = json_decode($data, true);
      $personImage = $data['results'][0]['profile_path'];
      $personId = $data['results'][0]['id'];

      $detailedUrl = "https://api.themoviedb.org/3/person/". $personId ."?api_key=15d2ea6d0dc1d476efbca3eba2b9bbfb&language=en-US";
      $data = file_get_contents($detailedUrl);
      $data = json_decode($data, true);
      $personBio = $data['biography'];


  if(sizeof($movies) > 0)
  return view('welcome', [
	'movies' => $movies,
	'randomMovie' => $randomMovie,
  'randomActor' => $randomActor,
  'posterImages' => $posterImages,
  'randomMoviePoster' => $randomMoviePoster,
  'summary' => $summary,
  'personImage' => $personImage,
  'personBio' => $personBio,
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
