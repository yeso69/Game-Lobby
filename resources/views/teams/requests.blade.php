

@extends('main')

@section('title', '| Requetes')
@section('stylesheets')
    <link rel="stylesheet" href="{{ URL('/css/request.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('content')



    <div id="view_request" class="col-lg-10">
        @foreach($data as $d)
            <div class="block_request text-center col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="col-lg-4">
                        <span class="from">From : {{$d->name}}</span>
                    </div>
                    <div class="col-lg-4 col-lg-offset-4">
                        <span class="time">At : {{$d->created_at}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <span>This user would like to join your team <span class="teamname">{{$d->name_team}}</span></span>
                    </div>
                    <a href="teams.acceptRequest"><input type="button" class="btn btn-success" id="acceptButton" value="Accept"></a>
                    <a><input type="button" class="btn btn-warning" id="declineButton" value="Decline"></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection