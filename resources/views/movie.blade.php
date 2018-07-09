@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="embed-responsive embed-responsive-16by9">
                 <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $video->id }}"></iframe>
             </div>
        </div>
        
        <div class="col-sm-3">
            <?php echo $video->snippet->title; ?>
        </div>
    </div>
@endsection