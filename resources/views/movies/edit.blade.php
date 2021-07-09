@extends('layouts.app')
@section('title', 'Editar pelicuala')
@section('content')



{!! Form::model($movie, ['route'=> ['movies.update',$movie], 'method'=>'PUT', 'files' =>  true])!!}


@include('movies.form')



<br>
{!! Form::submit('Guardar',['class'=>'btn btn-info'])!!}
{!! Form::close() !!}
<br>    

@endsection
