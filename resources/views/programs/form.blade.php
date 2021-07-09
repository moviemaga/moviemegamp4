<div style="margin: 30px;"></div>
<div style="background: linear-gradient(to bottom, #272321 , #1B92F0 );" class="container rounded text-white" >
<div class="form-group" ><br>
  {!! Form::label('nombre','Titulo')!!}
  {!! Form::text('nombre', null, ['class' => 'form-control'])!!}

  {!! Form::label('descripcion','Descripción')!!}
  {!! Form::textarea('descripcion', null, ['rows'=>4,'cols'=>54, 'class' => 'form-control'])!!}

  {!! Form::label('portada','Portada')!!}
  {!! Form::file('portada')!!}<br>

  {!! Form::label('categoriep','Seleciona categoría')!!}
  {!! Form::select('categoriep_id',$categorieps,null,['class' => 'form-control'])!!}

</div><br>
</div>

