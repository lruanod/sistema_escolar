
<div class="row form-group">
    <label for="cliente" class="col-5 text-white">Cliente</label>
    <input type="text"  class="form-control col-md-5" wire:model.defer="cliente">
    @error('cliente') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="tipo" class="col-5 text-white" >Tipo</label>
    <select class="form-control col-md-5" wire:model.defer="tipo">
        <option value="">Seleccionar tipo</option>
        <option value="Estudiate">Estudiante</option>
        <option value="Profesor">Profesor</option>
        <option value="Familiar">Familiar</option>
        <option value="Otro">Otro</option>
    </select>
    @error('tipo') <span class="text-warning">{{$message}}</span> @enderror
</div>





