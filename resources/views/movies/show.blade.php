@extends('layouts.app2')
@section('title', 'Ver pelicula')
@section('content')
@section('css')
   <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

  @include('common.succes')
 <div class="row">
   <div class="col-lg-12 text-white text-center">
	    <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">{{$movie->nombre}} <a href="/movies/{{$movie->slug}}/edit" class="btn btn-info">Editar</a></h1>

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
						 <h5 class="p-2 mb-1 text-white">Idioma
                          <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addlanguage">Asociar</button>
						 </h5>
				       </div>

                            @foreach($language_movies as $language_movie)


                              Idioma:&nbsp;{{$language_movie->language->nombrel}}&nbsp;/{{$language_movie->language->descripcionl}}

                                    {!!Form::open(['route'=>['language_movies.destroy',$language_movie->id], 'method'=>'DELETE'])!!}
		                                                   {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		                            {!!Form::close()!!}

                            @endforeach

					          <br><br>

					   <br>
		    </div><br>

		    <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Capturas
                           <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addscrim">Insertar scrims</button>
						 </h5>
				       </div>

					         @foreach($scrims as $scrim)
		                         <img src="/images/scrims/{{$scrim->urls}}" class="img-fluid" alt="Responsive image" style="width: 70%; height: 50%;" >
                               {!!Form::open(['route'=>['scrims.destroy',$scrim->id], 'method'=>'DELETE'])!!}
                               {!!Form::hidden('movie_id',$movie->id)!!}
		                                                   {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		                            {!!Form::close()!!}



		                         <br><br>
		                     @endforeach


		    </div><br>


		      <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Descargas
                          <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addunloading">Insertar descargas</button>
						 </h5>
				       </div>

				           @foreach($language_movie_unloadings as $language_movie_unloading)

					           {{$language_movie_unloading->servidor}}&nbsp;/&nbsp;{{$language_movie_unloading->language_movie->language->nombrel}}&nbsp/&nbsp{{$language_movie_unloading->language_movie->language->descripcionl}}

                      <form action="/public" method="get">
                          <input type="hidden" name="tipo" value="descarga"/>
                          <input type="hidden" name="urlu" value="{{$language_movie_unloading->urlu}}"/>
                          <input type="hidden" name="movie_id" value="{{$movie->id}}"/>
                          <button type="submit" class="btn btn-outline-warning">Descarga</button>
                      </form>

                      {!!Form::open(['route'=>['unloadings.destroy',$language_movie_unloading->id], 'method'=>'DELETE'])!!}
                      {!!Form::hidden('movie_id',$movie->id)!!}
                      {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                      {!!Form::close()!!}<br><br>
					       @endforeach
		                <br>
		      </div><br>


     <div class="container bg-dark text-warning rounded"><br>
			   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
				 <h5 class="p-2 mb-1 text-white">Ver online
				 	<button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addserver">Insertar descargas</button>
				 </h5>
		       </div>
		       <h5 class="p-2 mb-1 text-white"> Seleciona el tipo de servidor</h5>
                 @foreach($language_movie_servers as $language_movie_server)

                             <form action="/publico" method="get">
                                 <input type="hidden" name="tipo" value="online"/>
                                 <input type="hidden" name="urlse" value="{{$language_movie_server->urlse}}"/>
                                 <input type="hidden" name="movie_id" value="{{$movie->id}}"/>
                                 <button type="submit" class="btn btn-outline-warning">{{$language_movie_server->nombres}}</button>
                             </form>
                             {!!Form::open(['route'=>['servers.destroy',$language_movie_server->id], 'method'=>'DELETE'])!!}
                             {!!Form::hidden('movie_id',$movie->id)!!}
                             {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                             {!!Form::close()!!}

			     @endforeach
               <br><br>


     </div><br>


       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Anuncios de Publicidad para descarga
                   <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addpublicidad">Insertar publicidad</button>
               </h5>
           </div>
           <br>
           @foreach($publicidadsd as $publicidad)

               <div class="card-body bg-dark" style="border: orangered 5px outset;">
                   <div class="row form-group">
                       <label for="" class="col-2">Fecha</label>
                       <input type="text" name="fecha"   value="{{\carbon\carbon::parse($publicidad->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Proveedor</label>
                       <input type="text" name="provedor"   value="{{$publicidad->proveedor}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Codigo html5</label>
                       <textarea name="descripcion" class="form-control col-md-9" rows="6" cols="9">{{$publicidad->descripcion}}</textarea>
                   </div>
               </div>
               {!!Form::open(['route'=>['publicidads.destroy',$publicidad->id], 'method'=>'DELETE'])!!}
               {!!Form::hidden('movie_id',$movie->id)!!}
               {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
               {!!Form::close()!!}
               <br>

           @endforeach
           <br><br>
           {{$publicidadsd->links()}}
       </div><br>

       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Anuncios de Publicidad para online
                   <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addpublicidado">Insertar publicidad</button>
               </h5>
           </div>
           <br>
           @foreach($publicidadso as $publicidad)

               <div class="card-body bg-dark" style="border: orangered 5px outset;">
                   <div class="row form-group">
                       <label for="" class="col-2">Fecha</label>
                       <input type="text" name="fecha"   value="{{\carbon\carbon::parse($publicidad->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Proveedor</label>
                       <input type="text" name="provedor"   value="{{$publicidad->proveedor}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Codigo html5</label>
                       <textarea name="descripcion" class="form-control col-md-9" rows="6" cols="9">{{$publicidad->descripcion}}</textarea>
                   </div>
               </div>
               {!!Form::open(['route'=>['publicidads.destroy',$publicidad->id], 'method'=>'DELETE'])!!}
               {!!Form::hidden('movie_id',$movie->id)!!}
               {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
               {!!Form::close()!!}
               <br>

           @endforeach
           <br><br>
           {{$publicidadso->links()}}
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
               {!!Form::open(['route'=>['comentarios.destroy',$comentario->id], 'method'=>'DELETE'])!!}
               {!!Form::hidden('movie_id',$movie->id)!!}
               {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
               {!!Form::close()!!}
               <br>

           @endforeach
           <br><br>
           {{$comentarios->links()}}
       </div><br>



   </div>
</div>

<div class="modal fade" id="addlanguage" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Asociar</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<br>
			        <div class="form-group">
                  {!! Form::open(['route'=>'language_movies.store','method'=>'POST'])!!}


                     {!!Form::hidden('movie_id',$movie->id)!!}
					 {!! Form::label('language','Seleciona idioma')!!}
                     {!! Form::select('language_id',$languages,null,['class' => 'form-control'])!!}<br>
                     {!! Form::submit('Guardar',['class' => 'btn btn-outline-info'])!!}

                  {!! Form::close() !!}

				  	</div>

		      </div>
		    </div>
		  </div>
</div>



<div class="modal fade" id="addscrim" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Insertar scrim</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<br>
			        <div class="form-group">
                  {!! Form::open(['route'=>'scrims.store','method'=>'POST','files' => 'true','id'=>'my-dropzone','class'=>'dropzone'])!!}

                        <div class="dz-message" style="height: 200px;">
                        	Carga las imagenes
                        </div>
                        <div class="dropzone-previews"></div>

                     {!!Form::hidden('movie_id',$movie->id)!!}
                     <button type="submit" class="btn btn-outline-info" id="submit">Guardar</button>
                     {!! Form::close() !!}

				  	</div>

		      </div>
		    </div>
		  </div>
</div>

<div class="modal fade" id="addunloading" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Insertar enlace de descarga</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<br>
			        <div class="form-group">
                {!! Form::open(['route'=>'unloadings.store','method'=>'POST'])!!}
                     {!! Form::label('servidor','Gestor de descarga')!!}
                     {!! Form::text('servidor', null, ['class' => 'form-control'])!!}

                     {!! Form::label('urlu','Enlace de descarga')!!}
                     {!! Form::text('urlu', null, ['class' => 'form-control'])!!}

                     {!! Form::label('language_movie','Seleciona idioma')!!}
                     {!! Form::select('language_movie_id',$laguage_unloadings,null,['class' => 'form-control'])!!}

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

<div class="modal fade" id="addpublicidad" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar publicidad para descarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div class="form-group">
                    {!! Form::open(['route'=>'publicidads.store','method'=>'POST'])!!}
                    {!! Form::label('proveedor','Proveedor')!!}
                    {!! Form::text('proveedor', null, ['class' => 'form-control'])!!}
                    {!! Form::label('descripcion','Descripción')!!}
                    {!! Form::textarea('descripcion', null, ['rows'=>6,'cols'=>54, 'class' => 'form-control'])!!}
                    {!!Form::hidden('movie_id',$movie->id)!!}
                    {!!Form::hidden('tipo',value('descarga'))!!}
                    <br>
                    <br>

                    {!! Form::submit('Guardar',['class' => 'btn btn-outline-info'])!!}
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addpublicidado" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar publicidad para ver online</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div class="form-group">
                    {!! Form::open(['route'=>'publicidads.store','method'=>'POST'])!!}
                    {!! Form::label('proveedor','Proveedor')!!}
                    {!! Form::text('proveedor', null, ['class' => 'form-control'])!!}
                    {!! Form::label('descripcion','Descripción')!!}
                    {!! Form::textarea('descripcion', null, ['rows'=>6,'cols'=>54, 'class' => 'form-control'])!!}
                    {!!Form::hidden('movie_id',$movie->id)!!}
                    {!!Form::hidden('tipo',value('online'))!!}
                    <br>
                    <br>

                    {!! Form::submit('Guardar',['class' => 'btn btn-outline-info'])!!}
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addserver" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Insertar servidor online</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<br>
			        <div class="form-group">
                {!! Form::open(['route'=>'servers.store','method'=>'POST'])!!}
                     {!! Form::label('nombres','Servidor online')!!}
                     {!! Form::text('nombres', null, ['class' => 'form-control'])!!}

                     {!! Form::label('urlse','Enlace online')!!}
                     {!! Form::text('urlse', null, ['class' => 'form-control'])!!}

                     {!! Form::label('language_movie','Seleciona idioma')!!}
                     {!! Form::select('language_movie_id',$laguage_unloadings,null,['class' => 'form-control'])!!}

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
