

<div class="row form-group">
    <label for="ano" class="col-5 text-white">Ciclo escolar</label>
    <input type="number"  class="form-control col-md-5" wire:model="ano">
    @error('ano') <span class="text-warning">{{$message}}</span> @enderror
</div>






