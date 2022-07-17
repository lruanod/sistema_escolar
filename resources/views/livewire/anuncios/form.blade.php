

<div class="row form-group">
    <label for="afecha" class="col-5 text-white">Fecha</label>
    <input type="date"  class="form-control col-md-5" wire:model="afecha">
    @error('afecha') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="titulo" class="col-5 text-white">Titulo</label>
    <input type="text"  class="form-control col-md-5" wire:model="titulo">
    @error('titulo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="adescripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model="adescripcion"  rows="3"></textarea>
    @error('adescripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>






