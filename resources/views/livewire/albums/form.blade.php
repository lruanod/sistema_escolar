

<div class="row form-group">
    <label for="galbum" class="col-5 text-white">Nombre del album</label>
    <input type="text"  class="form-control col-md-5" wire:model="galbum">
    @error('galbum') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="ndescripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model="ndescripcion"  rows="3"></textarea>
    @error('ndescripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="gfecha" class="col-5 text-white">Fecha</label>
    <input type="date" class="form-control col-md-5" wire:model="gfecha">
    @error('gfecha') <span class="text-warning">{{$message}}</span> @enderror
</div>







