

<div class="row form-group">
    <label for="fecha" class="col-5 text-white">Fecha</label>
    <input type="date"  class="form-control col-md-5" wire:model="fecha" readonly="readonly">
    @error('fecha') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Grado</label>
    <select class="form-control col-md-5" wire:model="grado_id" readonly="reandoly">
        <option value="">Seleccionar Grado</option>
        @foreach($grado2s as $grado2)
            <option value="{{$grado2->id}}">{{$grado2->gnombre}}&nbsp;sección:&nbsp;{{$grado2->gseccion}}&nbsp;nivel:&nbsp;{{$grado2->nivel->nnombre}}</option>
        @endforeach
    </select>
    @error('grado_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Ciclo</label>
    <select class="form-control col-md-5" wire:model="ciclo_id" readonly="readonly">
        <option value="">Seleccionar Ciclo</option>
        @foreach($ciclos as $ciclo)
            <option value="{{$ciclo->id}}">{{$ciclo->ano}}</option>
        @endforeach
    </select>
    @error('ciclo_id') <span class="text-warning">{{$message}}</span> @enderror
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
    <label for="enombre3" class="col-5 text-white">Estudiante</label>
    <input type="text" class="form-control col-md-5" wire:model="enombre3" readonly="readonly">
    @error('enombre3') <span class="text-warning">{{$message}}</span> @enderror
</div>







