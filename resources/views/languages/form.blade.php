<div style="margin: 30px;"></div>
<div style="background: linear-gradient(to bottom, #272321 , #1B92F0 );" class="container rounded text-white" >
<div class="form-group" ><br>
      {!! Form::label('nombrel','Titulo')!!}
      {!! Form::text('nombrel', null, ['class' => 'form-control'])!!}

      {!! Form::label('descripcionl','Descripción') !!}
      {!! Form::textarea('descripcionl',null,  ['class' => 'form-control']) !!}

      {!! Form::label('bandera','Bandera')!!}
      {!! Form::file('bandera')!!}


</div><br>
</div>
