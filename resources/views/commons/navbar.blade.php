<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img class="logo" alt="ロゴ" src="{{ secure_asset('/img/logo.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto">
              @foreach($searchWords as $keyWord)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movie.onclickSearchWord', [ $keyWord['word'] ]) }}">{{ $keyWord['word'] }}</a>
                </li>
              @endforeach
         </ul>
         <div>
            @if (Auth::check())
                <a href="#">Users</a>
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>--}}
                <a href="#">{{ Auth::user()->name }}</a>
                <!--<li><a href="#">My profile</a></li>-->
                <!--<li role="separator" class="divider"></li>-->
                {!! link_to_route('logout.get', 'Logout', [], [ 'class' => 'btn btn-outline-success my-2 my-sm-0' ]) !!}
            @else
                {!! link_to_route('signup.get', 'Register') !!}
                {!! link_to_route('login', 'Login') !!}
            @endif
        </div>
    </div>
</nav>