{{--<!-- Default Bootstrap Navbar -->--}}
{{--<nav class="navbar navbar-default">--}}
    {{--<div class="container-fluid">--}}
        {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="/">Game Lobby</a>--}}
        {{--</div>--}}

        {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li ><a href="/findPlayers">Trouver des joueurs</a></li>--}}
                {{--<li><a href="/about">A propos</a></li>--}}
                {{--<li><a href="/contact">Contact</a></li>--}}
            {{--</ul>--}}

        {{--</div>--}}
        {{--<!-- /.navbar-collapse -->--}}
    {{--</div>--}}
    {{--<!-- /.container-fluid -->--}}
{{--</nav>--}}



<link rel="stylesheet" href="{{ URL('/css/leftbar.css') }}">
<script type="text/javascript" src="{{ URL('/js/leftbar.js') }}"></script>

<div class="col-lg-2" id="leftbar">
    <a href="/"><img id="leftbar_logo" src="{{ URL('/img/logo.gif') }}"></a>

    <div id="leftbar_menu">
            @if (!Auth::guest())
                <div class="leftbar_menuitem">
                    <span ><a href="/findPlayers">Trouver des joueurs</a></span>
                </div>
            @endif
            @if (Auth::guest())
                <div class="leftbar_menuitem">
                    <span ><a href="/login" role="button" aria-haspopup="true" aria-expanded="false">Se connecter</a></span>
                </div>
                <div class="leftbar_menuitem">
                    <span ><a href="/register" role="button" aria-haspopup="true" aria-expanded="false">S'inscrire</a></span>
                </div>
            @else
                <div class="leftbar_menuitem">
                    <span ><a href="/users/showInfo">Mon compte</a></span>
                </div>
                <div id="message_button" class="leftbar_menuitem">
                    <span id="message_button_title"><a href="#">Messages  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></span>
                    <div id="bloc_conversations">
                        <img src="{{ URL('/img/loading.gif') }}">
                    </div>
                </div>
                <div class="leftbar_menuitem">
                    <span ><a href="{{ url('/logout') }}"
                                          onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a></span>
                </div>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>
                </li>
            @endif
    </div>
</div>