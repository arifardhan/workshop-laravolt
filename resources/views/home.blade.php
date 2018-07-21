@extends('ui::layouts.app')

@section('content')
    <h1> {{ auth()->user()->name}} ada di /home </h1>
@stop