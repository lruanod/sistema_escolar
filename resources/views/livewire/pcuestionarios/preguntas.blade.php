<div class="container-fluid">
    @php($filas=1)
@foreach($preguntas as $pregunta)
        <span>{{$filas}})&nbsp;Pregunta:&nbsp;{{$pregunta->pregunta}}</span><br>
        <span>Valor:&nbsp;{{$pregunta->ppunteo}}&nbsp;Tipo:&nbsp;{{$pregunta->tipo}}</span><br>
        <br>
        @php($preguntacon=0)
        @php($cont=0)
        @foreach($respuestas as $respuesta)
            @if($pregunta->id==$respuesta->pregunta_id)

            @foreach($respuestaestudiantes as $erespuesta)
                @if($erespuesta->pregunta_id==$pregunta->id && $pregunta->cuestionario_id==$erespuesta->cuestionario_id && $preguntacon==0)
                        <span>Respuesta:&nbsp;{{$erespuesta->rerespuesta}}</span><br>
                        <span>Resolución:&nbsp;{{$erespuesta->reestado}}</span><br>
                        @php($cont=$cont + 1)
                        @php($preguntacon=$preguntacon + 1)
                @endif
            @endforeach


            @endif
        @endforeach
    <br><br>
    @php($filas=$filas+1)
@endforeach
    <br>
    <div class="row form-group ">
        <button  class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
    </div>
</div>




