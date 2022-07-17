

<div class="row form-group">
    <label for="fecha" class="col-5 text-white">Fecha</label>
    <input type="date"  class="form-control col-md-5" wire:model="fecha">
    @error('fecha') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Curso</label>
    <select class="form-control col-md-5" wire:model="curso_id">
        <option value="">Seleccionar curso</option>
        @foreach($cursos as $curso)
            <option value="{{$curso->id}}">{{$curso->cnombre}}&nbsp;Grado:&nbsp;{{$curso->grado->gnombre}}&nbsp;seccion:&nbsp;{{$curso->grado->gseccion}}&nbsp;nivel:&nbsp;{{$curso->grado->nivel->nnombre}}</option>
        @endforeach
    </select>
    @error('curso_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="estado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="mnombre2" class="col-5 text-white">Maestro</label>
    <input type="text" class="form-control col-md-5" wire:model="mnombre2" readonly="readonly">
    @error('mnombre2') <span class="text-warning">{{$message}}</span> @enderror
</div>







