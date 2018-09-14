@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>プロフィール:{{ $name }} の編集</h1><!-- FIXME-->
    </div>
    
    <div class="form-group">
        {!! Form::label('file', 'プロフィール画像:') !!}
        {!! Form::file('file') !!}
    </div>
    <div class="form-group form-check">
        {!! Form::label('category', 'お気に入りカテゴリ:') !!}
            {!! Form::label('category', '言語:') !!}
            {!! Form::checkbox('category') !!}
            {!! Form::label('category', '言語2:') !!}
            {!! Form::checkbox('category') !!}
            {!! Form::label('agree', 1, true, [ 'class' => 'form-check-input' ]) !!}
            {!! Form::checkbox('category', '言語3:', [ 'class' => 'form-check-label' ]) !!}
            
            @foreach($searchWords as $category)
                {!! Form::label('agree', $category->word, false, [ 'class' => 'form-check-input' ]) !!}
                {!! Form::checkbox('category', $category->word, [ 'class' => 'form-check-label' ]) !!}
                
                {{--{!! Form::label('category', $category->word) !!}
                {!! Form::checkbox('category') !!}--}}
            @endforeach
    </div>
    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
@endsection