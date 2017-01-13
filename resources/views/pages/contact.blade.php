
@extends('main')

@section('title', '| Contact')

@section('stylesheets')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Nous contacter</h1>
        <hr>
        <form>
            <div class="form-group">
                <label name="email">Email:</label>
                <input id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label name="subject">Sujet:</label>
                <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
                <label name="message">Message:</label>
                <textarea id="message" name="message" class="form-control">Taper votre message...</textarea>
            </div>

            <input type="submit" value="Envoyer" class="btn btn-success">
        </form>
    </div>
</div>
    @endsection