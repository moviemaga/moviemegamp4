@extends('layouts.app')
@section('title', 'Editar categtoria')
@section('content')


{!! Form::model($categoriep,['route'=>['categorieps.update',$categoriep],'method'=>'PUT'])!!}

@include('categorieps.form')




{!! Form::submit('Guardar',['class'=>'btn btn-outline-info'])!!}
{!! Form::close() !!}


@endsection
