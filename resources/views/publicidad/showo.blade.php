@extends('layouts.app2')
@section('title', 'Ver pelicula')
@section('content')
@section('css')
   <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

  @include('common.succes')
 <div class="row">
   <div class="col-lg-12 text-white text-center">
	    <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">Descargas</h1>

	    </div>

       <div class="container bg-dark text-warning rounded"><br>
           <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
               <h5 class="p-2 mb-1 text-white">Instrucciones</h5>
           </div>

          <p>Hacer click en la publicidad, no cierres la ventana del navegador y espera 50 segundos, para ser redirigido al servidor online</p>
           <h1 id="mensaje" ></h1>

       </div><br>

       <div class="container bg-dark text-warning rounded"><br>
           <a onclick="temporizador()" target="_blank">

           @foreach($publicidades as $publicidad)
               {!! $publicidad->descripcion !!}
           @endforeach

           </a>


           <div class="embed-responsive embed-responsive-16by9">
               <div id="pelicula">

                   <iframe src="{{$urlse}}" width="560" height="315" allowfullscreen="" frameborder="0" sandbox="allow-scripts allow-same-origin allow-presentation" layout="responsive"></iframe>'
               </div>


           </div>

           <br>
       </div><br>

   </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        var contador = 3; // Segundos
        var redirecciona = "{{$urlse}}";
        document.getElementById("pelicula").style.display = "none";

        function temporizador(){

            var mensaje = document.getElementById("mensaje");
            if(contador > 0){
                contador--;
                mensaje.innerHTML = "Redireccionando en "+contador+" segundos.";
                setTimeout("temporizador()", 1000);
            }else{
                document.getElementById("pelicula").style.display = "block";
                window.open(redirecciona, '_blank');
            }
        }
    </script>

@endsection
