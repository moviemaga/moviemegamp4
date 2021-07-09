@extends('layouts.app2')
@section('title', 'Legal')
@section('content')
@section('css')
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

@include('common.succes')
<div class="row">
    <div class="col-lg-12 text-white ">
        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded text-center">
            <h1 class="p-3 mb-2 ">Aviso Legal</h1>
        </div>

        <div class="container bg-dark text-warning rounded"><br>

            <ul>

                <li>Nosotros no reproducimos, plagiamos, distribuimos ni comunicamos públicamente películas, series o documentales que puedan tener derechos de autor.</li>
                <li>We will not reproduce, plagiarize, distribute or publicly communicate any movie documentaries that can be copyrighted.</li>
                <br>
                <li>Los enlaces que aparecen en esta web han sido encontrados en páginas de terceros como YouTube, https://peliculas-dvdrip.com, https://www.locopelis.com, https://aquipelis.net, https://gnula.nu, https://decine21.com, https://www.pelispedia.de, https://allpeliculas.io, http://bajalogratis.com, https://pelix.me, https://mega1link.com, https://pelicula4k.com, https://romspure.com, https://www.gamulator.com, https://www.romsgames.net ... y desconocemos si los mismos tienen contratos de cesión de derechos sobre estos videos para reproducirlos, alojarlos o permitir su descarga.</li>
                <li>The links that appear on this website have been found on third-party pages such as YouTube, https://peliculas-dvdrip.com, https://www.locopelis.com, https://aquipelis.net, https: //gnula.nu, https://decine21.com, https://www.pelispedia.de, https://allpeliculas.io, http://bajalogratis.com, https://pelix.me, https://mega1link.com, https://pelicula4k.com, https://romspure.com, https://www.gamulator.com, https://www.romsgames.net... and we do not know if they have contracts for the transfer of rights over these videos to reproduce, host or allow their download.</li>
                <br>
                <li>No nos hacemos responsables del uso indebido que puedas hacer del contenido de nuestra página.</li>
                <li>We are not responsible for the abuse you can do the content of our website</li>
                <br>
                <li>En ningún caso o circunstancia se podrá responsabilizar directamente o indirectamente al propietario ni a los colaboradores del ilícito uso de la información contenida en Moviemega. Así mismo tampoco se nos podrá responsabilizar directamente o indirectamente de incorrecto uso o mala interpretación que se haga de la información y servicios incluidos. Igualmente quedara fuera de nuestra responsabilidad el material al que usted pueda acceder desde nuestros enlaces.</li>
                <li>In no case or circumstance may the owner or collaborators be held directly or indirectly responsible for the illicit use of the information contained in Moviemega. Likewise, we cannot be held directly or indirectly responsible for the incorrect use or misinterpretation of the information and services included. Likewise, the material that you can access from our links will be out of our responsibility.</li>
                <br>
                <li>Si en tu país, este tipo de página está prohibido, tú y solo tú eres el responsable de la entrada a Moviemega.</li>
                <li>If this type of page is prohibited in your country, you and only you are responsible for entering Moviemega</li>
                <br>
                <li>Si decides permanecer en Moviemega, quiere decir que has leído, comprendido y aceptas las condiciones de esta página.</li>
                <li>If you decide to stay in Moviemega, it means that you have read, understood and accept the conditions of this page.</li>
                <br>
                <li>Todo el contenido ha sido exclusivamente sacado de sitios públicos de Internet, por lo que este material es considerado de libre distribución, pero si existe algún tipo de inconveniente con el contenido en esta web puede enviar una solicitud formal del retiro de la publicación al correo moviemegamp4@gmail.com.</li>
                <li>All the content has been exclusively taken from public Internet sites, so this material is considered free distribution, but if there is any kind of problem with the content on this website, you can send a formal request to remove the publication to the email moviemegamp4@gmail.com.</li>
                <br>
                <li>La visita o acceso a esta página web, que es de carácter privado y no público, exige la aceptación del presente aviso. En esta web se podrá acceder a contenidos publicados por canales de YouTobe, https://peliculas-dvdrip.com, https://www.locopelis.com, https://aquipelis.net, https://gnula.nu, https://decine21.com, https://www.pelispedia.de, https://allpeliculas.io, http://bajalogratis.com, https://pelix.me, https://mega1link.com, https://pelicula4k.com https://romspure.com, https://www.gamulator.com, https://www.romsgames.net, etc. El único material que existe en la web de Moviemega son enlaces a dicho contenido, facilitando únicamente el acceso. Los propietarios de https://peliculas-dvdrip.com, https://www.locopelis.com, https://aquipelis.net, https://gnula.nu, https://decine21.com, https://www.pelispedia.de, https://allpeliculas.io, http://bajalogratis.com, https://pelix.me, https://mega1link.com, https://pelicula4k.com, https://romspure.com, https://www.gamulator.com, https://www.romsgames.net, etc., son plenamente responsables de los contenidos que publiquen. Por consiguiente, Moviemega ni aprueba, ni hace suyos los productos, servicios, contenidos, información, datos, opiniones archivos y cualquier clase de material existente en las webs;  peliculas-dvdrip.com, www.locopelis.com, aquipelis.net, gnula.nu, decine21.com, www.pelispedia.de,  allpeliculas.io, bajalogratis.com, pelix.me, mega1link.com, pelicula4k.com, romspure.com, www.gamulator.com, www.romsgames.net y no controla ni se hace responsable de la calidad, licitud, fiabilidad y utilidad de la información, contenidos y servicios existentes en YouTube, peliculas-dvdrip.com, www.locopelis.com, aquipelis.net, gnula.nu, decine21.com, www.pelispedia.de,  allpeliculas.io, bajalogratis.com, pelix.me, mega1link.com, pelicula4k.com, romspure.com, www.gamulator.com, www.romsgames.net.</li>
                <li>Visiting or accessing this website, which is private and not public, requires acceptance of this notice. On this website you can access content published by YouTobe channels, https://peliculas-dvdrip.com, https://www.locopelis.com, https://aquipelis.net, https://gnula.nu, https://decine21.com, https://www.pelispedia.de, https://allpeliculas.io, http://bajalogratis.com, https://pelix.me, https://mega1link.com, https://pelicula4k.com https://romspure.com, https://www.gamulator.com, https://www.romsgames.net, etc. The only material that exists on the Moviemega website are links to said content, only facilitating access. The owners of https://peliculas-dvdrip.com, https://www.locopelis.com, https://aquipelis.net, https://gnula.nu, https://decine21.com, https: / /www.pelispedia.de, https://allpeliculas.io, http://bajalogratis.com, https://pelix.me, https://mega1link.com, https://pelicula4k.com, https://romspure.com, https://www.gamulator.com, https://www.romsgames.net, etc., are fully responsible for the content they publish. Consequently, Moviemega neither endorses nor endorses the products, services, content, information, data, opinions, files and any kind of material on the websites; peliculas-dvdrip.com, www.locopelis.com, aquipelis.net, gnula.nu, decine21.com, www.pelispedia.de, allpeliculas.io, bajalogratis.com, pelix.me, mega1link.com, pelicula4k.com, romspure.com, www.gamulator.com, www.romsgames.net and does not control nor is it responsible for the quality, legality, reliability and usefulness of the information, content and services on YouTube, peliculas-dvdrip.com, www. locopelis.com, aquipelis.net, gnula.nu, decine21.com, www.pelispedia.de, allpeliculas.io, bajalogratis.com, pelix.me, mega1link.com, pelicula4k.com, romspure.com, www.gamulator. com, www.romsgames.net.</li>
                <br>
            </ul>



        </div><br>


    </div>
</div>

@endsection
