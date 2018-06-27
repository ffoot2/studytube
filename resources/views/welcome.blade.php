@extends('layouts.app')

@section('content')
    
    <div class="row">
    @foreach($videos['results'] as $video)
         <div class="col-sm-3">
             <img src="<?php echo $video->snippet->thumbnails->default->url; ?>"
                  alt="<?php echo $video->snippet->title ?>">
            </img>
            <div class="tit">
                {!! $video->snippet->title !!}
            </div>
        </div>
    @endforeach
    </div>
@endsection