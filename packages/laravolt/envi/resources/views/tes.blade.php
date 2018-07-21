@extends('ui::layouts.app')

@section('content')
    <h1> {{ auth()->user()->name}} Environtment Variables </h1>

    {!! SemanticForm::post(route('envi::update')) !!}

    @foreach($variables as $variable)
        {!! SemanticForm::text($variable, env($variable))->label($variable) !!}
    @endforeach

    {!! SemanticForm::submit("simpan") !!}

    {!! SemanticForm::close() !!}


@endsection