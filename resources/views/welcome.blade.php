<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <nav class="navbar-expand-md navbar-light">
    <div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
        <ul class="navbar-nav">
          <li class="nav-item mx-2"> <a class="nav-link" href="#">Products</a> </li>
          <li class="nav-item mx-2"> <a class="nav-link" href="#">FAQ</a> </li>
          <li class="nav-item mx-2"> <a class="nav-link navbar-brand mr-0 text-primary" href="#"><i class="fas fa-film"></i>
              <b> MovieDB</b></a> </li>
          <li class="nav-item mx-2"> <a class="nav-link" href="#">About us</a> </li>
          <li class="nav-item mx-2"> <a class="nav-link" href="#">Contacts </a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="	background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(img/board-cinema-cinematography-274937.jpg);	background-position: center center, center center;	background-size: cover, cover;	background-repeat: repeat repeat, repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4 mb-3">What movie you looking for?</h1>
          <form class="form-inline d-inline-flex">
            <div class="input-group">
              <input type="text" class="form-control pr-5" id="inlineFormInputGroup" placeholder="Search">
              <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 text-center" >
          <h1>Top Six Movies of All-time by Oscar Wins</h1>
        </div>
      </div>
      <div class="row justify-content-center">
		  @foreach($movies as $movie)
        <div class="col-lg-4 col-md-6 p-4">
          <div class="row">
            <div class="col-3 p-0 d-flex align-items-center"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-1.svg"> </div>
            <div class="col-9">
              <p class="lead mb-1"> <b>#{{$loop->iteration }}</b> </p>
              <p class="mb-0">{{ $movie->Title }}</p>
			  <p class="mb-0">Genres: {{ $movie->Genre }}</p>
			  <p class="mb-0">Director: @foreach($movie->directors as $director) {{ $director->DirectorName }} @endforeach</p>
			  <p class="mb-0">Star Actors: @foreach($movie->actors as $actor) {{ $actor->Name }}, @endforeach</p>
			</div>
          </div>
        </div>
		@endforeach
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>
</body>

</html>