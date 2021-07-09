<div style="margin: 30px;"></div>
<div style="background: linear-gradient(to bottom, #272321 , #1B92F0 );" class="container rounded text-white" >
<div class="form-group" ><br>
  {!! Form::label('nombre','Titulo')!!}
  {!! Form::text('nombre', null, ['class' => 'form-control'])!!}

  {!! Form::label('sinopsis','Sinopsis')!!}
  {!! Form::textarea('sinopsis', null, ['rows'=>4,'cols'=>54, 'class' => 'form-control'])!!}

  {!! Form::label('calidad','Calidad de video')!!}
  {!! Form::text('calidad', null, ['class' => 'form-control'])!!}

  {!! Form::label('fechaestreno','Fecha de estreno')!!}
  {!! Form::date('fechaestreno', null, ['class' => 'form-control'])!!}

  {!! Form::label('trailer','Trailer')!!}
  {!! Form::text('trailer', null, ['class' => 'form-control'])!!}<br>

  {!! Form::label('portada','Portada')!!}
  {!! Form::file('portada')!!}<br>

  {!! Form::label('estrella','Calificación de estrllas')!!}
  {!! Form::select('estrella', [''=>'Selecciona el # de estrellas']+['1'=>'★','2'=>'★★','3'=>'★★★','4'=>'★★★★','5'=>'★★★★★'],null, ['class' => 'form-control'])!!}

  {!! Form::label('category','Seleciona categoría')!!}
  {!! Form::select('category_id',$categories,null,['class' => 'form-control'])!!}

  {!! Form::label('language','Seleciona el idioma')!!}
  {!! Form::select('language_id',$languages,null,['class' => 'form-control'])!!}

  


           
</div><br>
</div> 

