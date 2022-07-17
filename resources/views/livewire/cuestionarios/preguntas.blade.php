<div class="container-fluid">
    @php($cont=0)
@foreach($preguntas as $pregunta)
        @php($cont=$cont+1)
       <span>{{$cont}}) &nbsp;&nbsp;Pregunta:&nbsp;{{$pregunta->pregunta}}</span><br>
        <span>Punteo:&nbsp;{{$pregunta->ppunteo}}</span><br>
        <span>Tipo:&nbsp;{{$pregunta->tipo}}</span><br>
        <button type="button" class="btn-sm btn-danger " title="Eliminar pregunta" wire:click="destroy({{$pregunta->id}})" >
            <i class="fas fa-cut "></i>
        </button>
        <button type="button" class="btn-sm btn-info"  data-toggle="modal" data-target="#editasignar" title="editar archivo" wire:click="editasignar({{$pregunta->id}})" >
            <i class="fas fa-pencil-alt "></i>
        </button>
        <button type="button" class="btn-sm btn-warning"  data-toggle="modal" data-target="#addasignar2" title="Agregar Respuesta" wire:click="addasignar2({{$pregunta->id}})" >
            <i class="fas fa-question-circle "></i>
        </button>
        <br>
        @foreach($respuestas as $respuesta)
                @if($pregunta->id==$respuesta->pregunta_id)
                    <span>Respuesta:&nbsp;{{$respuesta->respuesta}}</span><br>
                    <span>Resolución:&nbsp;{{$respuesta->restado}}</span><br>
                    <button type="button" class="btn-sm btn-danger " title="Eliminar respuesta" wire:click="destroy2({{$respuesta->id}})" >
                        <i class="fas fa-cut "></i>
                    </button>
                    <button type="button" class="btn-sm btn-info"  data-toggle="modal" data-target="#editasignar2" title="editar respuesta" wire:click="editasignar2({{$respuesta->id}})" >
                        <i class="fas fa-pencil-alt "></i>
                    </button> <br>
                @endif
        @endforeach
    <br><br>
@endforeach
    <br>
    <div class="row form-group ">
        <button wire:click="default" class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
    </div>
</div>




