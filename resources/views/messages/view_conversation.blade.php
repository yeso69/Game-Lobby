<?php
/**
 * Created by PhpStorm.
 * User: Pelomedusa
 * Date: 17/01/2017
 * Time: 05:49
 */

?>
@extends('main')

@section('title', '| Messages')

@section('stylesheets')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL('/css/conversation.css') }}">
@endsection

@section('content')
        <div class="col-md-10" id="view_conversation">
            <div class="col-lg-8 col-lg-offset-2" id="bloc_view_conversation">
            @foreach ($messages as $message)
                    @if ($message->sender == Auth::user()->id )
                        <div class="row">
                            <div class="bloc_message_sent col-lg-9">
                                {{ $message->body }}
                            </div>
                        </div>
                    @else
                        <?php $receiver = $message->sender; ?>
                        <div class="row">
                            <div class="bloc_message_received col-lg-9 col-lg-offset-3">
                                {{ $message->body }}
                            </div>
                        </div>
                    @endif
            @endforeach
            </div>
            <div class="row">
            <div class="col-lg-8 col-lg-offset-2" id="bloc_send_message">
                <form method="POST" action="{{ URL('/message/sendMessage') }}">
                    <div class="col-lg-9">
                        <textarea name="body"></textarea>
                    </div>
                    <input name="receiver" type="hidden" value="{{ $receiver }}">
                    <div class="col-lg-3">
                        <input id="sendbutton" type="submit" value="Send">
                    </div>
                </form>
            </div>
            </div>
        </div>
@endsection