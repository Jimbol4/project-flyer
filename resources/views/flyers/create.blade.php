@extends('layout')

@section('content')
<h1>Selling Your Home?</h1>

<hr>

{!! Form::open(['files' => true, 'action' => 'FlyersController@store']) !!}
    
@include('flyers.form')

{!! Form::close() !!}

@endsection

