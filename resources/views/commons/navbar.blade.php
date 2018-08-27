<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="/"><img class="logo" alt="ロゴ" src="{{ asset('/img/logo.png') }}"></a>
    <ul class="navbar-nav mr-auto">
      @foreach($searchWords as $keyWord)
        <li "nav-item active"><a href="{{ route('movie.onclickSearchWord', [ $keyWord['word'] ]) }}">{{ $keyWord['word'] }}</a></li>
      @endforeach
     </ul>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
            @if (Auth::check())
                <a href="#">Users</a>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <!--<li><a href="#">My profile</a></li>-->
                <!--<li role="separator" class="divider"></li>-->
                {!! link_to_route('logout.get', 'Logout') !!}
            @else
                {!! link_to_route('signup.get', 'Signup') !!}
                {!! link_to_route('login', 'Login') !!}
            @endif
        
     </button>
  </nav>