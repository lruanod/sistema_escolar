

<div class="row form-group">
    <label for="bimestre" class="col-5 text-white">Bimestre</label>
    <input type="text"  class="form-control col-md-5" wire:model="bimestre" readonly="readonly">
    @error('bimestre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="zepunteo" class="col-5 text-white">Nota</label>
    <input type="number" wire:model="zepunteo" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('zepunteo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="enombre" class="col-5 text-white">Estudiante</label>
    <input type="text"  class="form-control col-md-5" wire:model="enombre" readonly="readonly">
</div>

<div class="row form-group">
    <label for="gnombre" class="col-5 text-white">Grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="gnombre" readonly="readonly">
</div>

<div class="row form-group">
    <label for="cnombre" class="col-5 text-white">curso</label>
    <input type="text"  class="form-control col-md-5" wire:model="cnombre" readonly="readonly">
</div>






