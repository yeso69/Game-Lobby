
@extends('main')

@section('title', '| Accueil')

@section('stylesheets')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Bienvenue sur Game Lobby</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
        </div>
    </div>
</div>
<!-- end of header .row -->

<div class="row">
    <div class="col-md-8">
        <div class="post">
            <h3>Exemple de données</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis amet tenetur eum, consequuntur assumenda officiis quidem omnis placeat. Sequi ex fugiat reiciendis at eligendi inventore ad, odio magnam velit doloribus...</p>
            <a href="#" class="btn btn-primary">Read More</a>
        </div>

        <hr>

    </div>

    <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
    </div>
</div>

@endsection