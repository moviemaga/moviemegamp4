<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <title>megamovie = @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/portada.css') }}" rel="stylesheet">
    @yield('css')

  </head>
  <body style="background-image: url(/images/estrellas.gif);">

    <header>
      @include('layouts.navbar')
    </header>

 <div class="jumbotron text-center" style="max-height:60vh; background-image:url(/images/estrellas.gif);">
        <!-- portada -->
	     <img src="/images/portada limpia.png"  style=" position: relative; width: 90vw; max-height:55vh; min-height: 30vh;" >

				<div id="wrapper" style="margin-top: 5vw;">
				  <p id="title" contenteditable="true" spellcheck="false"><span>Movie</span><span>-mega</span><span>-mp4.</span><span>com</span></p>
				  <p id="slogan"><span>Peliculas, Programas y más...</span></p>
				</div>
</div>

    <main role="main">
		<!-- contenedor -->
		<div  style="background-image: url(/images/fondo.jpg); "  class="container marketing">
		      </br>

		        @yield('content')
		</div>
		<!-- /fin de contenedor -->


      <!-- FOOTER -->
        <footer class="container text-center">
            <a class="float-right btn btn-outline-warning" href="/">Inicio</a>  <a href="/legal" class=" float-left btn btn-outline-warning"> Aviso Legal</a>
            <h3 class="text-white">Copyright © 2021 Moviemega </h3>
            <p class="text-white">Descargo de responsabilidad: este sitio no almacena ningún archivo en su servidor. Todos los contenidos son proporcionados por terceros no afiliados.</p>
        </footer>
      <!-- fin FOOTER -->

    </main>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>



      @yield('scripts')

  </body>




</html>
