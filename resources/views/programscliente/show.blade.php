@extends('layouts.app2')
@section('title', 'Ver programa')
@section('content')
@section('css')
   <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

  @include('common.succes')
 <div class="row">
   <div class="col-lg-12 text-white text-center">
	    <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">{{$program->nombre}}</h1>

	    </div>

			<div class="container bg-dark text-warning rounded"><br>
			   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
				 <h5 class="p-2 mb-1 text-white">Descripción del programa</h5>
		       </div>
			    {{$program->descripcion}}<br><br>

            </div><br>


		    <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Capturas</h5>
				       </div>

					         @foreach($scrimps as $scrimp)
		                         <img src="/images/scrims/{{$scrimp->urls}}" class="img-fluid" alt="Responsive image" style="width: 70%; height: 50%;" >

		                         <br><br>
		                     @endforeach


		    </div><br>


		      <div class="container bg-dark text-warning rounded"><br>
					   <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
						 <h5 class="p-2 mb-1 text-white">Descargas
						 </h5>
				       </div>




				           @foreach($unloadingps as $unloadingp)
                                  {{$unloadingp->servidor}}&nbsp;&nbsp;
                              <form action="/publicp" method="get">
                                  <input type="hidden" name="tipo" value="descarga"/>
                                  <input type="hidden" name="urlu" value="{{$unloadingp->urlu}}"/>
                                  <input type="hidden" name="program_id" value="{{$program->id}}"/>
                                  <button type="submit" class="btn btn-outline-warning">Descarga</button>
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
               <br>

           @endforeach
           <br><br>
           {{$comentariops->links()}}
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

