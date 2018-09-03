@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>カテゴリ: {{ $searchWord->word }} の編集</h1>
    </div>

    <div class="form-group">
        {!! Form::model($searchWord, ['route' => ['admin.update', $searchWord->id], 'method' => 'put']) !!}
    
            <div class="form-group">
                {!! Form::label('word', 'カテゴリ:') !!}
                {!! Form::text('word') !!}
            </div>
            <div class="form-group">
                {!! Form::label('sort', 'ソート:') !!}
                {!! Form::text('sort') !!}
            </div>
            
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
    
        {!! Form::close() !!}
    </div>

@endsection