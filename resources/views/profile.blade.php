@extends('layouts.app')

@section('content')
{!! Form::open(['files' => true, 'class' => '']) !!}
    {{ method_field('PUT') }}
    <div class="text-center">
        <h1>プロフィール:{{ $name }} の編集</h1><!-- FIXME-->
    </div>
    
    <div class="form-group">
        {!! Form::label('file', 'プロフィール画像:') !!}
        <div class="custom-file">
            {!! Form::file('file', [ 'class' => 'custom-file-input', 'id' => 'profileFile' ]) !!}
            {!! Form::label('profileFile', '選択してください', [ 'class' => 'custom-file-label' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('file', 'カテゴリ:') !!}<br>
        @foreach($searchWords as $category)
            <div class="form-check form-check-inline">
                {{ Form::checkbox('category[]', $category->word, false, [ 'class' => 'form-check-input' ]) }}
                {{ Form::label('category[]', $category->word, [ 'class' => 'form-check-label' . ($errors->has('category') ? ' is-invalid' : '') ]) }}
            </div>
        @endforeach
    </div>
    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection