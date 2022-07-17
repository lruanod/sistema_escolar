

<div class="row form-group">
    <label for="nnombre" class="col-5 text-white">Nivel académico</label>
    <input type="text"  class="form-control col-md-5" wire:model="nnombre">
    @error('nnombre') <span class="text-warning">{{$message}}</span> @enderror
</div>






