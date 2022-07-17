<div class="container-fluid">
    <section>
    @php($cont=0)
        @foreach($cuestionarioestudiantes as $cus)
            @if($cont==0 && $cus->reintento <= $cus->cuestionario->reintento)
                @php($cont=$cont+1)
                <button type="button" class="btn btn-warning"   title="Repetir cuestionario" wire:click="repetir({{$cus->reintento}})" >
                    <i class="fas fa-reply-all"> Intentos permitidos {{$cus->reintento}}/{{$cus->cuestionario->reintento}}</i>
                </button>

            @endif
        @endforeach
    </section>

         <br>
    @php($filas=1)
@foreach($preguntaestudiantes as $pregunta)

        <span>{{$filas}})&nbsp;Pregunta:&nbsp;{{$pregunta->pregunta->pregunta}}</span><br>
        <span>Valor:&nbsp;{{$pregunta->pregunta->ppunteo}}&nbsp;Tipo:&nbsp;{{$pregunta->pregunta->tipo}}</span><br>
        <br>
        @php($preguntacon=0)
        @php($cont=0)
        @foreach($respuestas as $respuesta)
            @if($pregunta->pregunta_id==$respuesta->pregunta_id)
            @foreach($respuestaestudiantes as $erespuesta)
                @if($erespuesta->preguntaestudiante->pregunta_id==$pregunta->pregunta_id && $pregunta->cuestionario_id==$erespuesta->cuestionario_id && $preguntacon==0)
                        <span>Respuesta:&nbsp;{{$erespuesta->rerespuesta}}</span><br>
                        <span>Resolución:&nbsp;{{$erespuesta->reestado}}</span><br>
                        <span>Calificación:&nbsp;{{$erespuesta->repunteo}}</span><br>
                        @php($cont=$cont + 1)
                        @php($preguntacon=$preguntacon + 1)
                @endif
            @endforeach

            @if($cont==0)
                    @if(strpos($pregunta->pregunta->tipo,'Cerrada') !== false)
                        <a type="button" class="btn-sm btn-success " title="seleciona la correcta" wire:click="calificar({{$pregunta->id}},{{$respuesta->id}})" >
                            <i class="fas fa-check ">&nbsp;&nbsp;{{$respuesta->respuesta}}</i>
                        </a>
                    @endif

                    @if(strpos($pregunta->pregunta->tipo,'Abierta') !== false)
                            <textarea class="form-control " wire:model.defer="erespuesta" wire:change="change({{$pregunta->pregunta_id}})"  rows="3"></textarea>
                    @endif
                @endif
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




