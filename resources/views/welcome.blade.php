<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'MovieDB') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>

<body style="background: url(/img/movie-journal-2015-greyscale-RESIZED.png);margin: 0;background-position: center;background-repeat: no-repeat;background-size: cover;" >
  <div class="container border p-0 shadow" style="background-color: #ffffff">
    <nav class="navbar-expand-md navbar-light">
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3" style="">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center shadow border" id="navbar3">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Movies</a>
			  <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="/movies">
						All
					</a>

					<a class="dropdown-item" href="/movies/genres">
						Genres
					</a>

					<a class="dropdown-item" href="/movies?popular=1">
						Popular
					</a>
					</div>
			  </li>
          <li class="nav-item mx-2"> <a class="nav-link" href="#">Actors</a> </li>
          <li class="nav-item mx-2"> <a class="nav-link navbar-brand mr-0 text-primary" href="#"><i class="fas fa-film" style="color: #212529;"></i>
              <b style="color: #212529;"> MovieDB</b></a> </li>
          <li class="nav-item mx-2"> <a class="nav-link" href="#">Directors</a> </li>
          <li class="nav-item mx-2"> <a class="nav-link" href="#">About us </a> </li>
        </ul>
      </div>
    </nav>
    <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="	background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(&quot;img/board-cinema-cinematography-274937.jpg&quot;);	background-position: center center, center center;	background-size: cover, cover;	background-repeat: repeat repeat, repeat;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3">What are you looking for?</h2>
            <form class="form-inline d-inline-flex">
              <div class="input-group" id="app">
              <search-component></search-component>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="" style="">
      <div class="container">
        <div class="row">
          <div class="col-md-6 border-bottom">
              <h3 class="py-3 text-center">Featured Film</h3>
              <div class="col d-inline-flex">
                <img class="d-block img-fluid align-items-center" style="width: 200px; height: 100%;" src="https://image.tmdb.org/t/p/w500{{ $randomMoviePoster }}">
                <p class="ml-2 mt-3" style="">{{ $randomMovie->Title }} <br>Released: {{ $randomMovie->YearReleased }} <br>Genres: {{ $randomMovie->Genre }} <br>Director: @foreach($randomMovie->directors as $director) {{ $director->DirectorName }} @endforeach
                @if(sizeof($randomMovie->actors) > 0)
                <br>{{ str_plural('Star', sizeof($randomMovie->actors)) }}: @foreach($randomMovie->actors as $actor) @if ($loop->last) {{ $actor->Name }} @else {{ $actor->Name }}, @endif @endforeach @endif <br>Rating: {{ $randomMovie->Rating }} / 10<br>
                  <br>{{ $summary }}</p>
              </div>
            </div>
          <div class="border-left col-md-6 col-lg-6">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4 class="my-3">Top searches</h4>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-6 col-lg-7 p-2">
                <div class="row">
                  <div class="col-3 d-flex align-items-center p-0"> <img class="d-block img-fluid" src="https://static.pingendo.com/img-placeholder-1.svg"> </div>
                  <div class="col-9">
                    <p class="lead mb-1"> <b>#1</b> </p>
                    <p class="mb-0">A wonderful serenity has taken possession of my entire soul.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-7 p-2">
                <div class="row">
                  <div class="col-3 p-0 d-flex align-items-center"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-4.svg"> </div>
                  <div class="col-9">
                    <p class="lead mb-1"> <b>#2</b> </p>
                    <p class="mb-0">I am alone, and feel the charm of existence in this spot.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-7 p-2">
                <div class="row">
                  <div class="col-3 p-0 d-flex align-items-center"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-2.svg"> </div>
                  <div class="col-9">
                    <p class="lead mb-1"> <b>#3</b> </p>
                    <p class="mb-0">I should be incapable of drawing a single stroke.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-7 p-2">
                <div class="row">
                  <div class="col-3 p-0 d-flex align-items-center"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
                  <div class="col-9">
                    <p class="lead mb-1"> <b>#4</b> </p>
                    <p class="mb-0">I throw myself down among the tall grass by the trickling stream.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-7 p-2">
                <div class="row">
                  <div class="col-3 p-0 d-flex align-items-center"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-1.svg"> </div>
                  <div class="col-9">
                    <p class="lead mb-1"> <b>#5</b> </p>
                    <p class="mb-0">I lie close to the earth, a thousand unknown plants.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-7 p-2">
                <div class="row">
                  <div class="col-3 p-0 d-flex align-items-center"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-4.svg"> </div>
                  <div class="col-9">
                    <p class="lead mb-1"> <b>#6</b> </p>
                    <p class="mb-0">When I hear the buzz of the little world among the stalks.</p>
                  </div>
                </div>
              </div>
            </div>
            <hr class="shadow-sm">
          </div>
          <div class="col-md-6 col-lg-6">
            <h3 class="text-center mt-2 mb-2" >Featured Actor / Actress</h3>
            <div class="col d-inline-flex">
              <img class="d-block img-fluid align-items-center" style="margin-top: 2ex; width: 200px; height: 100%;" src="https://image.tmdb.org/t/p/w500{{ $personImage }}">
              <p class="ml-2 mt-3" style="">{{ $randomActor->Name }} <br>Born:&nbsp;{{ $randomActor->ActorDOB }}
                <br>Known for: @foreach ($randomActor->movies as $movie) @if ($loop->last) {{ $movie->Title }} ({{ $movie->YearReleased }}) @else {{ $movie->Title }} ({{ $movie->YearReleased }}), @endif @endforeach <br>
                <br>{{ $personBio }}</p>
            </div>
          </div>
          <div class="col-md-6 border-left mb-2">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4 class="my-2">Top Ranked Films</h4>
              </div>
            </div>
            <div class="row justify-content-center">
               @foreach($movies as $movie)
              <div class="col-md-6 col-lg-7">
                <div class="row">
                  <div class="col-3 d-flex align-items-center p-0"> <img class="d-block img-fluid" src="https://image.tmdb.org/t/p/w500{{ $posterImages[$movie->Title] }}"> </div>
                  <div class="col-9 p-2">
                    <p class="lead mb-1"> <b>#{{$loop->iteration }}</b> </p>
                    <p class="mb-0">{{ $movie->Title }}</p>
                    <p class="mb-0">Released: {{ $movie->YearReleased }}</p>
      			        <p class="mb-0">Genres: {{ $movie->Genre }}</p>
      			        <p class="mb-0">Director: @foreach($movie->directors as $director) {{ $director->DirectorName }} @endforeach</p>
      			        @if(sizeof($movie->actors) > 0)
                    <p class="mb-0"> {{ str_plural('Star', sizeof($movie->actors)) }}: @foreach($movie->actors as $actor) @if ($loop->last) {{ $actor->Name }} @else {{ $actor->Name }}, @endif @endforeach</p> @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr class="shadow-sm">
              <div class="py-3">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-3 col-6 p-3">
                      <h5> <b>Main</b> </h5>
                      <ul class="list-unstyled">
                        <li> <a href="#">Home</a> </li>
                        <li> <a href="#">Features</a> </li>
                        <li> <a href="#">Pricing</a> </li>
                      </ul>
                    </div>
                    <div class="col-lg-3 col-6 p-3">
                      <h5> <b>Others</b> </h5>
                      <ul class="list-unstyled">
                        <li> <a href="#">FAQ</a> </li>
                        <li> <a href="#">Resources</a> </li>
                        <li> <a href="#">Career</a> </li>
                      </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 p-3">
                      <h5> <b>About</b> </h5>
                      <p class="mb-0"> I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 p-3">
                      <h5> <b>Follow us</b> </h5>
                      <div class="row">
                        <div class="col-md-12 d-flex align-items-center justify-content-between my-2"> <a href="#">
                            <i class="d-block fab fa-facebook-f text-muted mr-2"></i>
                          </a> <a href="#">
                            <i class="d-block fab fa-instagram text-muted mx-2"></i>
                          </a> <a href="#">
                            <i class="fab fa-google-plus-g text-muted mx-2"></i>
                          </a> <a href="#">
                            <i class="d-block fab fa-pinterest-p text-muted mx-2"></i>
                          </a> <a href="#">
                            <i class="d-block fab fa-reddit-alien text-muted mx-2"></i>
                          </a> <a href="#">
                            <i class="d-block fab fa-twitter text-muted ml-2"></i>
                          </a> </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p class="mb-0 mt-2">© 2014-2018 MovieDB. All rights reserved</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" style=""></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous" style=""></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>
    </div>
  </div>
</body>

</html>
