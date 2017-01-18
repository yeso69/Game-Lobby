<link rel="stylesheet" href="{{ URL('/css/leftbar.css') }}">
<script type="text/javascript" src="{{ URL('/js/leftbar.js') }}"></script>

<div class="col-lg-2" id="leftbar">
    <a href="/"><img id="leftbar_logo" src="{{ URL('/img/logo.gif') }}"></a>

    <div id="leftbar_menu">
            @if (Auth::guest())
                <div class="leftbar_menuitem">
                    <span ><a href="/login" role="button" aria-haspopup="true" aria-expanded="false">Se connecter</a></span>
                </div>
                <div class="leftbar_menuitem">
                    <span ><a href="/register" role="button" aria-haspopup="true" aria-expanded="false">S'inscrire</a></span>
                </div>
            @else
            <div class="leftbar_menuitem">
                <span ><a href="/users/{{Auth::user()->id}}/edit">Mon compte</a></span>
            </div>

            <div id="jeux_button" class="leftbar_menuitem" style="margin-top: 10px">
                <span id="jeux_button_title"><a href="#">Jeux</a></span>
                <div id="bloc_jeux">
                    <div class="leftbar_dropdownitem">
                        <span ><a href="/users/showInfo">Mes jeux</a></span>
                    </div>
                    <div class="leftbar_dropdownitem">
                        <span ><a href="/findPlayers">Trouver des joueurs</a></span>
                    </div>

                </div>
            </div>
            <div id="team_button" class="leftbar_menuitem">
                <span id="team_button_title"><a href="#">Teams</a></span>
                <div id="bloc_teams">
                    <div class="leftbar_dropdownitem">
                        <span ><a href="{{ route('teams.myTeams') }}">Mes Teams</a></span>
                    </div>
                    <div class="leftbar_dropdownitem">
                        <span ><a href="{{ route('teams.index') }}">Créer une Team</a></span>
                    </div>
                    <div class="leftbar_dropdownitem">
                        <span ><a href="{{ route('teams.list') }}">Trouver des Teams</a></span>
                    </div>
                </div>
            </div>
            <div class="leftbar_menuitem"  style="margin-top: 10px">
                <span ><a href="{{ route('teams.showNewRequests') }}">Requests</a></span>
            </div>
            <div id="message_button" class="leftbar_menuitem">
                <span id="message_button_title"><a href="#">Messages</a></span>
                <div id="bloc_conversations">
                    <img src="{{ URL('/img/loading.gif') }}">
                </div>
            </div>
            <div class="leftbar_menuitem" style="margin-top: 50px">
                <span ><a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a></span>
            </div>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
    </div>
</div>