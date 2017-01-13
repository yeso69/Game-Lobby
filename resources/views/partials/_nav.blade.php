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
                {{--<li class="active"><a href="/findPlayers">Trouver des joueurs</a></li>--}}
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
        <div class="leftbar_menuitem" style="margin-top: 100px">
            <ul class="nav navbar-nav navbar-right">
                @if (!Auth::guest())
                    <div class="leftbar_menuitem">
                        <li class="active"><a href="/findPlayers">Trouver des joueurs</a></li>
                    </div>
                @endif
                @if (Auth::guest())
                    <li>
                        <a href="/login" role="button" aria-haspopup="true" aria-expanded="false">Se connecter</a>
                    </li>

                    <li>
                        <a href="/register" role="button" aria-haspopup="true" aria-expanded="false">S'inscrire</a>
                    </li>
                @else
                    <li class="dropdown">
                            <li><a href="/users/showInfo">Mon compte</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>