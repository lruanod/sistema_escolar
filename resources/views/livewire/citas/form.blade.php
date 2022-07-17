

<div class="row form-group">
    <label for="cinombre" class="col-5 text-white">Nombre </label>
    <input type="text"  class="form-control col-md-5" wire:model="cinombre" readonly="readonly">
    @error('cinombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cifecha" class="col-5 text-white">Fecha de la cita</label>
    <input type="datetime-local"  class="form-control col-md-5" wire:model="cifecha">
    <span class="col-md-5 text-warning">
        {{\carbon\carbon::parse($identificador)->format('d/m/Y H:i')}}
    </span>
    @error('cifecha') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cicel" class="col-5 text-white">Teléfono</label>
    <input type="number"  class="form-control col-md-5" wire:model="cicel" readonly="readonly">
    @error('cicel') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cicorreo" class="col-5 text-white">Correo electrónico</label>
    <input type="text"  class="form-control col-md-5" wire:model="cicorreo" readonly="readonly">
    @error('cicorreo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cidescripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model="cidescripcion"  rows="3" readonly="readonly"></textarea>
    @error('cidescripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ciestado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="ciestado">
        <option value="">Seleccionar Estado</option>
        <option value="Solicitado">Solicitado</option>
        <option value="Atendido">Atendido</option>
    </select>
    @error('ciestado') <span class="text-warning">{{$message}}</span> @enderror
</div>






