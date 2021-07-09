@extends('layouts.app')
@section('title', 'Editar lenguage')
@section('content')

    @include('common.errors')
    <div class="col-lg-12"> <!-- ancho -->
        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
            <h1 class="p-3 mb-2  text-white text-center">Editar leguaje</h1>
        </div>
    </div>
    <div class="col-lg-6"> <!-- ancho -->


{!! Form::model($language, ['route'=> ['languages.update',$language], 'method'=>'PUT','files' =>  true])!!}


@include('languages.form')



<br>
{!! Form::submit('Guardar',['class'=>'btn btn-info'])!!}
{!! Form::close() !!}
<br>
    </div> <!-- ancho -->
    <br>

@endsection
