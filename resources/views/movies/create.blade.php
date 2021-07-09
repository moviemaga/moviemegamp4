@extends('layouts.app')
@section('title', 'Crear pelicula')
@section('content')

@include('common.errors')
          <div class="col-lg-12"> <!-- ancho -->
	          <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">  
	             <h1 class="p-3 mb-2  text-white text-center">Crear peliculas</h1>
	          </div>
         </div>
 <div class="col-lg-6"> <!-- ancho -->
		{!! Form::open(['route'=>'movies.store','method'=>'POST','files' => true])!!}

		@include('movies.form')

        <br>
		{!! Form::submit('Guardar',['class' => 'btn btn-outline-info'])!!}
		{!! Form::close() !!}
 </div> <!-- ancho -->
<br>

 

@endsection
