@extends('layouts.app')

@section('content')

<div class="jumbotron p-3 p-md-5 rounded main_visual text-white">
  <div class="col-md-9 px-0">
    <h1 class="display-4 font-italic">studytube</h1>
    <p class="lead my-3">様々なカテゴリのプログラミング学習をサポートするサイトです。<br>あらかじめ設定しておいたカテゴリの動画をyoutubeから取得して表示します。</p>
  </div>
</div>
<div class="row mb-2">
  @foreach($categories as $category)
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <a href="{{ route('movie.onclickSearchWord', $category['word']) }}"<strong class="d-inline-block mb-2 text-primary">{{ $category['word'] }}</strong></a>
          <h3 class="mb-0">
            <a class="text-dark" href="#">Featured post</a>
          </h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        </div>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="" alt="Card image cap">
      </div>
    </div>
  @endforeach
<!--以下サンプルコード--------------------->
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Featured post</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Post title</a>
              </h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
          </div>
        </div>
<!--以上サンプルコード----------------------->
</div>
@endsection