

<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre</label>
    <input type="text"  class="form-control col-md-5" wire:model="enombre">
    @error('enombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="direccion" class="col-5 text-white">Dirección</label>
    <input type="text" class="form-control col-md-5" wire:model="edireccion">
    @error('edireccion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ecui" class="col-5 text-white">CUI</label>
    <input type="number" class="form-control col-md-5" wire:model="ecui">
    @error('ecui') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ecorreo" class="col-5 text-white">Correo electronico</label>
    <input type="email" class="form-control col-md-5" wire:model="ecorreo" readonly="readonly">
    @error('ecorreo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="epass" class="col-5 text-white">Contraseña</label>
    <input type="text" class="form-control col-md-5" wire:model="epass">
    @error('epass') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="eusuario" class="col-5 text-white">Usuario</label>
    <input type="text" class="form-control col-md-5" wire:model="eusuario" readonly="readonly">
    @error('eusuario') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="estado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="eestado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('eestado') <span class="text-warning">{{$message}}</span> @enderror
</div>





