@extends('layouts.app')
@section('title', 'Editar categtoria')
@section('content')


{!! Form::model($category,['route'=>['categories.update',$category],'method'=>'PUT'])!!}

@include('categories.form')




{!! Form::submit('Guardar',['class'=>'btn btn-outline-info'])!!}
{!! Form::close() !!}
     

@endsection
