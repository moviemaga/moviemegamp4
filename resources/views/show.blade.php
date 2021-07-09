@extends('layouts.app2')
@section('title', 'Ver pelicula')
@section('content')
@section('css')
   <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

  @include('common.succes')
 <div class="row">
   <div class="col-lg-12 text-white text-center">
	    <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">{{$movie->nombre}} </h1>

	    </div>

		<div class="container bg-dark text-warning rounded"><br>
		   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
		        <h5 class="p-2 mb-1 text-white">Trailer</h5>
		   </div>

		  <div class="embed-responsive embed-responsive-16by9" style="width: 85vh; height: 60vh; margin-left:auto; margin-right:auto; ">

               {!!Embed::make($movie->trailer)->parseUrl()->getIframe()!!}


          </div> <br>


        </div><br>

			<div class="container bg-dark text-warning rounded"><br>
			   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
				 <h5 class="p-2 mb-1 text-white">Sinopsis de la película</h5>
		       </div>
			    {{$movie->sinopsis}}<br><br>

            </div><br>


			<div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Calidad</h5>
				       </div>
					             {{$movie->calidad}}<br><br>
		    </div><br>

		    <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Idioma</h5>
				       </div>

                            @foreach($language_movies as $language_movie)

                              Idioma:&nbsp;{{$language_movie->language->nombrel}}&nbsp;/{{$language_movie->language->descripcionl}}

                            @endforeach

					          <br><br>

					   <br>
		    </div><br>

		    <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Capturas</h5>
				       </div>

					         @foreach($scrims as $scrim)
		                         <img src="/images/scrims/{{$scrim->urls}}" class="img-fluid" alt="Responsive image" style="width: 70%; height: 50%;" >
		                         <br><br>
		                     @endforeach

		    </div><br>


		      <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Descargas</h5>
				       </div>


				           @foreach($language_movie_unloadings as $language_movie_unloading)
					           {{$language_movie_unloading->servidor}}&nbsp;/&nbsp;{{$language_movie_unloading->language_movie->language->nombrel}}&nbsp/&nbsp{{$language_movie_unloading->language_movie->language->descripcionl}}<br>
                                  <form action="/public" method="get">
                                      <input type="hidden" name="tipo" value="descarga"/>
                                      <input type="hidden" name="urlu" value="{{$language_movie_unloading->urlu}}"/>
                                      <input type="hidden" name="movie_id" value="{{$movie->id}}"/>
                                      <button type="submit" class="btn btn-outline-warning">Descarga</button>
                                  </form>
                               <br>
					       @endforeach
		                <br>
		      </div><br>


     <div class="container bg-dark text-warning rounded"><br>
			   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
				 <h5 class="p-2 mb-1 text-white">Ver online</h5>
		       </div>
		       <h5 class="p-2 mb-1 text-white"> Seleciona el tipo de servidor</h5>

                 @foreach($language_movie_servers as $language_movie_server)
                     <form action="/publico" method="get">
                         <input type="hidden" name="tipo" value="online"/>
                         <input type="hidden" name="urlse" value="{{$language_movie_server->urlse}}"/>
                         <input type="hidden" name="movie_id" value="{{$movie->id}}"/>
                         <button type="submit" class="btn btn-outline-warning">{{$language_movie_server->nombres}}</button>
                     </form>
                     <br>
			     @endforeach
                 <br>
     </div><br>

       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Comentarios
                   <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addcomentario">Insertar comentario</button>
               </h5>
           </div>
           <br>
           @foreach($comentarios as $comentario)

               <div class="card-body bg-dark" style="border: orangered 5px outset;">
                   <div class="row form-group">
                       <label for="" class="col-2">Fecha</label>

                       <input type="text" name="fecha"   value="{{\carbon\carbon::parse($comentario->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Usuario</label>
                       <input type="text" name="usuario"   value="{{$comentario->usuario}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Comentario</label>
                       <textarea name="descripcion" class="form-control col-md-9" rows="2" cols="9">{{$comentario->descripcion}}</textarea>
                   </div>
               </div>
               <br>

           @endforeach
           <br><br>
           {{$comentarios->links()}}
       </div><br>



   </div>
</div>

<div class="modal fade" id="addcomentario" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div class="form-group">
                    {!! Form::open(['route'=>'comentarios.store','method'=>'POST'])!!}
                    {!! Form::label('usuario','Nombre')!!}
                    {!! Form::text('usuario', null, ['class' => 'form-control'])!!}
                    {!! Form::label('descripcion','Descripción')!!}
                    {!! Form::textarea('descripcion', null, ['rows'=>2,'cols'=>54, 'class' => 'form-control'])!!}
                    {!!Form::hidden('movie_id',$movie->id)!!}
                    <br>
                    <br>

                    {!! Form::submit('Guardar',['class' => 'btn btn-outline-info'])!!}
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    {!! Html::script('js/dropzone.js'); !!}
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            paramName:"file",
            uploadMultiple: true,
            maxFilezise: 20,
            maxFiles: 5,

            accept::function(file,done){
            	var submitBtn = document.querySelector("#submit");
                myDropzone = this;
            	done();
            }

        };
    </script>
@endsection
