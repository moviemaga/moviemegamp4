@extends('layouts.app')
@section('title', 'Lenguaje')
@section('content')

  @include('common.succes')

<div class="row">
         <div class="col-lg-12"> <!-- ancho -->
	          <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
	             <h1 class="p-3 mb-2  text-white text-center">Lenguajes</h1>
	          </div>
         </div>



				  @foreach($languages as $language)
				        <!-- tarjeta-->
							 <div class="btn-outline-light btn-lg col-lg-3">


						           <div class=" shadow-lg card-p-5 mb-3 rounded text-white" style="width: 100%; height: 95%; border-color: #F4D03F #E74C3C #F4D03F #E74C3C;  border-width: 0.5vw ; border-style: solid; background-image: url(images/estrellas.gif);" >
							                <br>
							          	  <div class="text-center">
							                 <img class="rounded" src="images/categoria.png" alt="Generic placeholder image" width="100vw" height="150vh"  href="#">
							              </div>
							              <div class="card-body" style="  width: 100%; height: 5%;">
							                      <div style="background-color:#566573; border-color: #F4D03F #E74C3C #F4D03F #E74C3C;  border-width: 0.5vw; border-style: solid; ">
							                          <font size="3">
                                                          <p class="card-text text-center">{{$language->nombrel}}</p>
                                                      </font> <n></n>
                                                      <font size="2">
                                                          <p class="card-text text-center">{{$language->descripcionl}}</p>
                                                      </font>


							                       </div> <br>
							                       <div class="row">
								                       	<div class="col-lg-6">
	                                                      <a href="/languages/{{$language->slugl}}/edit" class="btn btn-outline-info">Editar</a>
	                                                    </div>
		                                                 <div class="col-lg-6">
		                                                   {!!Form::open(['route'=>['languages.destroy',$language->slugl], 'method'=>'DELETE'])!!}
		                                                   {!!Form::submit('Eliminar',['class'=>'btn btn-outline-danger'])!!}
		                                                   {!!Form::close()!!}
		                                                 </div>
                                                   </div>
							              </div>
							        </div>
							 </div>
							<!-- fin tarjeta-->
				  @endforeach

    </div><!-- ancho-->
  {{$languages->links()}}






@endsection
