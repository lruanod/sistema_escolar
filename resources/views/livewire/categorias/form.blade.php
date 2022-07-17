

<div class="row form-group">
    <label for="nombrec" class="col-5 text-white">Nombre de la categoria</label>
    <input type="text"  class="form-control col-md-5" wire:model.defer="nombrec">
    @error('nombrec') <span class="text-warning">{{$message}}</span> @enderror
</div>







