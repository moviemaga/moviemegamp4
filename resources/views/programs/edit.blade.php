@extends('layouts.app')
@section('title', 'Editar programa')
@section('content')



{!! Form::model($program, ['route'=> ['programs.update',$program], 'method'=>'PUT', 'files' =>  true])!!}


@include('programs.form')



<br>
{!! Form::submit('Guardar',['class'=>'btn btn-info'])!!}
{!! Form::close() !!}
<br>

@endsection
