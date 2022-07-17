

<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre</label>
    <input type="text"  class="form-control col-md-5" wire:model="pnombre">
    @error('pnombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="direccion" class="col-5 text-white">Dirección</label>
    <input type="text" class="form-control col-md-5" wire:model="pdireccion">
    @error('pdireccion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pcel" class="col-5 text-white">Tel</label>
    <input type="number" class="form-control col-md-5" wire:model="pcel">
    @error('pcel') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pcui" class="col-5 text-white">CUI</label>
    <input type="number" class="form-control col-md-5" wire:model="pcui">
    @error('pcui') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ppariente" class="col-5 text-white" >Parentesco</label>
    <select class="form-control col-md-5" wire:model="ppariente">
        <option value="">Seleccionar pariente</option>
        <option value="Padre">Padre</option>
        <option value="Madre">Madre</option>
        <option value="Abuelo">Abuelo</option>
        <option value="Abuela">Abuela</option>
        <option value="Encargado">Encargado</option>
    </select>
    @error('ppariente') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pcorreo" class="col-5 text-white">Correo electronico</label>
    <input type="email" class="form-control col-md-5" wire:model="pcorreo">
    @error('pcorreo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="epass" class="col-5 text-white">Contraseña</label>
    <input type="text" class="form-control col-md-5" wire:model="ppass">
    @error('ppass') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="eusuario" class="col-5 text-white">Usuario</label>
    <input type="text" class="form-control col-md-5" wire:model="pusuario">
    @error('pusuario') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="enombre2" class="col-5 text-white">Estudiante</label>
    <input type="text" class="form-control col-md-5" wire:model="enombre2" readonly="readonly">
    @error('enombre2') <span class="text-warning">{{$message}}</span> @enderror
</div>







