@extends('layouts.app')

@section('content')
    
    <div class="row custom-row">
        @foreach($videos['results'] as $video)
             <div class="col-sm-3 masu">
                 <a href="{{ url('movie', [ $video->id->videoId ]) }}">
                     <img src="<?php echo $video->snippet->thumbnails->default->url; ?>"
                          alt="<?php echo $video->snippet->title ?>">
                    </img>
                </a>
                <div class="tit">
                    {!! $video->snippet->title !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection

