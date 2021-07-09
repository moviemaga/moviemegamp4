@extends('layouts.app2')
@section('title', 'Ver programa')
@section('content')
@section('css')
   <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

  @include('common.succes')
 <div class="row">
   <div class="col-lg-12 text-white text-center">
	    <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">{{$program->nombre}} <a href="/programs/{{$program->slug}}/edit" class="btn btn-info">Editar</a></h1>

	    </div>

			<div class="container bg-dark text-warning rounded"><br>
			   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
				 <h5 class="p-2 mb-1 text-white">Descripción del programa</h5>
		       </div>
			    {{$program->descripcion}}<br><br>

            </div><br>


		    <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Capturas
                           <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addscrim">Insertar scrims</button>
						 </h5>
				       </div>

					         @foreach($scrimps as $scrimp)
		                         <img src="/images/scrims/{{$scrimp->urls}}" class="img-fluid" alt="Responsive image" style="width: 70%; height: 50%;" >
                               {!!Form::open(['route'=>['scrimps.destroy',$scrimp->id], 'method'=>'DELETE'])!!}
                               {!!Form::hidden('program_id',$program->id)!!}
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
				       </div> <br>


				           @foreach($unloadingps as $unloadingp)

                      <div class="card-body bg-dark" style="border: orangered 5px outset;">
                                  <h5>{{$unloadingp->servidor}}</h5>
                                   <br>
                                  <form action="/publicp" method="get">
                                      <input type="hidden" name="tipo" value="descarga"/>
                                      <input type="hidden" name="urlu" value="{{$unloadingp->urlu}}"/>
                                      <input type="hidden" name="program_id" value="{{$program->id}}"/>
                                      <button type="submit" class="btn btn-outline-warning">Descarga</button>
                                  </form>
                                      {!!Form::open(['route'=>['unloadingps.destroy',$unloadingp->id], 'method'=>'DELETE'])!!}
                                      {!!Form::hidden('program_id',$program->id)!!}
                                      {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                                      {!!Form::close()!!}
                      </div><br>
					       @endforeach
		                <br>
		      </div><br>

       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Anuncios de Publicidad para descarga
                   <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addpublicidad">Insertar publicidad</button>
               </h5>
           </div>
           <br>
           @foreach($publicidadpsd as $publicidadp)

               <div class="card-body bg-dark" style="border: orangered 5px outset;">
                   <div class="row form-group">
                       <label for="" class="col-2">Fecha</label>
                       <input type="text" name="fecha"   value="{{\carbon\carbon::parse($publicidadp->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Proveedor</label>
                       <input type="text" name="provedor"   value="{{$publicidadp->proveedor}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Codigo html5</label>
                       <textarea name="descripcion" class="form-control col-md-9" rows="6" cols="9">{{$publicidadp->descripcion}}</textarea>
                   </div>
               </div>
               {!!Form::open(['route'=>['publicidadps.destroy',$publicidadp->id], 'method'=>'DELETE'])!!}
               {!!Form::hidden('program_id',$program->id)!!}
               {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
               {!!Form::close()!!}
               <br>

           @endforeach
           <br><br>
           {{$publicidadpsd->links()}}
       </div><br>

       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Anuncios de Publicidad para online
                   <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addpublicidado">Insertar publicidad</button>
               </h5>
           </div>
           <br>
           @foreach($publicidadpso as $publicidadp)

               <div class="card-body bg-dark" style="border: orangered 5px outset;">
                   <div class="row form-group">
                       <label for="" class="col-2">Fecha</label>
                       <input type="text" name="fecha"   value="{{\carbon\carbon::parse($publicidadp->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Proveedor</label>
                       <input type="text" name="provedor"   value="{{$publicidadp->proveedor}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Codigo html5</label>
                       <textarea name="descripcion" class="form-control col-md-9" rows="6" cols="9">{{$publicidadp->descripcion}}</textarea>
                   </div>
               </div>
               {!!Form::open(['route'=>['publicidads.destroy',$publicidadp->id], 'method'=>'DELETE'])!!}
               {!!Form::hidden('program_id',$program->id)!!}
               {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
               {!!Form::close()!!}
               <br>

           @endforeach
           <br><br>
           {{$publicidadpso->links()}}
       </div><br>



       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Comentarios
                   <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addcomentario">Insertar comentario</button>
               </h5>
           </div>
           <br>
           @foreach($comentariops as $comentariop)

               <div class="card-body bg-dark" style="border: orangered 5px outset;">
                   <div class="row form-group">
                       <label for="" class="col-2">Fecha</label>

                       <input type="text" name="fecha"   value="{{\carbon\carbon::parse($comentariop->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Usuario</label>
                       <input type="text" name="usuario"   value="{{$comentariop->usuario}}" class="form-control col-md-9" >
                   </div>
                   <div class="row form-group">
                       <label for="" class="col-2">Comentario</label>
                       <textarea name="descripcion" class="form-control col-md-9" rows="2" cols="9">{{$comentariop->descripcion}}</textarea>
                   </div>
               </div>
               {!!Form::open(['route'=>['comentariops.destroy',$comentariop->id], 'method'=>'DELETE'])!!}
               {!!Form::hidden('program_id',$program->id)!!}
               {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
               {!!Form::close()!!}
               <br>

           @endforeach
           <br><br>
           {{$comentariops->links()}}
       </div><br>




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
                    {!! Form::open(['route'=>'publicidadps.store','method'=>'POST'])!!}
                    {!! Form::label('proveedor','Proveedor')!!}
                    {!! Form::text('proveedor', null, ['class' => 'form-control'])!!}
                    {!! Form::label('descripcion','Descripción')!!}
                    {!! Form::textarea('descripcion', null, ['rows'=>6,'cols'=>54, 'class' => 'form-control'])!!}
                    {!!Form::hidden('program_id',$program->id)!!}
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
                    {!! Form::open(['route'=>'publicidadps.store','method'=>'POST'])!!}
                    {!! Form::label('proveedor','Proveedor')!!}
                    {!! Form::text('proveedor', null, ['class' => 'form-control'])!!}
                    {!! Form::label('descripcion','Descripción')!!}
                    {!! Form::textarea('descripcion', null, ['rows'=>6,'cols'=>54, 'class' => 'form-control'])!!}
                    {!!Form::hidden('program_id',$program->id)!!}
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
                  {!! Form::open(['route'=>'scrimps.store','method'=>'POST','files' => 'true','id'=>'my-dropzone','class'=>'dropzone'])!!}

                        <div class="dz-message" style="height: 200px;">
                        	Carga las imagenes
                        </div>
                        <div class="dropzone-previews"></div>

                     {!!Form::hidden('program_id',$program->id)!!}
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
                {!! Form::open(['route'=>'unloadingps.store','method'=>'POST'])!!}
                     {!! Form::label('servidor','Gestor de descarga')!!}
                     {!! Form::text('servidor', null, ['class' => 'form-control'])!!}

                     {!! Form::label('urlu','Enlace de descarga')!!}
                     {!! Form::text('urlu', null, ['class' => 'form-control'])!!}

                     {!!Form::hidden('program_id',$program->id)!!}

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
                    {!! Form::open(['route'=>'comentariops.store','method'=>'POST'])!!}
                    {!! Form::label('usuario','Nombre')!!}
                    {!! Form::text('usuario', null, ['class' => 'form-control'])!!}
                    {!! Form::label('descripcion','Descripción')!!}
                    {!! Form::textarea('descripcion', null, ['rows'=>2,'cols'=>54, 'class' => 'form-control'])!!}
                    {!!Form::hidden('program_id',$program->id)!!}
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
