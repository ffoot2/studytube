@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新規カテゴリ作成</h1>
    </div>
        <div class="form-group">
            {!! Form::model($searchWord, ['route' => 'admin.store']) !!}
                <div class="form-group">
                    {!! Form::label('word', 'カテゴリ:') !!}
                    {!! Form::text('word') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sort', 'ソート:') !!}
                    {!! Form::text('sort') !!}
                </div>
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

@endsection