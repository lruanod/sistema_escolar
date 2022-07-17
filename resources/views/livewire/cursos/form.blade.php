

<div class="row form-group">
    <label for="cnombre" class="col-5 text-white">Nombre del curso o materia</label>
    <input type="text"  class="form-control col-md-5" wire:model="cnombre">
    @error('cnombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Grado</label>
    <select class="form-control col-md-5" wire:model="grado_id">
        <option value="">Seleccionar Grado</option>
        @foreach($grados as $grado)
            <option value="{{$grado->id}}">{{$grado->gnombre}}&nbsp;sección:&nbsp;{{$grado->gseccion}}&nbsp;nivel:&nbsp;{{$grado->nivel->nnombre}}</option>
        @endforeach
    </select>
    @error('grado_id') <span class="text-warning">{{$message}}</span> @enderror
</div>






