
<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre</label>
    <input type="text"  class="form-control col-md-5" wire:model="mnombre">
    @error('mnombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="mdireccion" class="col-5 text-white">Dirección</label>
    <input type="text" class="form-control col-md-5" wire:model="mdireccion">
    @error('mdireccion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="mcui" class="col-5 text-white">CUI</label>
    <input type="number" class="form-control col-md-5" wire:model="mcui">
    @error('mcui') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pcel" class="col-5 text-white">Tel</label>
    <input type="number" class="form-control col-md-5" wire:model="mcel">
    @error('mcel') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="mpass" class="col-5 text-white">Contraseña</label>
    <input type="text" class="form-control col-md-5" wire:model="mpass">
    @error('mpass') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="musuario" class="col-5 text-white">Usuario</label>
    <input type="text" class="form-control col-md-5" wire:model="musuario" readonly="readonly">
    @error('musuario') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="mcorreo" class="col-5 text-white">Correo electronico</label>
    <input type="email" class="form-control col-md-5" wire:model="mcorreo" readonly="readonly">
    @error('mcorreo') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="estado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="mestado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('mestado') <span class="text-warning">{{$message}}</span> @enderror
</div>





