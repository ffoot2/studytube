<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img class="logo" alt="ロゴ" src="{{ asset('/img/logo.png') }}">
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
                {!! link_to_route('logout.get', 'Logout', [], [ 'class' => 'btn btn-outline-success my-2 my-sm-0' ]) !!}
        </div>
    </div>
</nav>