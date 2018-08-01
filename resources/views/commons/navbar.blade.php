<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="/">StudyTube</a>-->
                <a href="/"><img class="logo" alt="ロゴ" src="{{ asset('/img/logo.png') }}"></a>
            </div>
            <div>&nbsp;</div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    @foreach($searchWords as $keyWord)
                        <li><a href="{{ route('movie.index2', [ $keyWord['word'] ]) }}">{{ $keyWord['word'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>