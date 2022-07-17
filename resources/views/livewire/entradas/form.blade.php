

<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre del producto</label>
    <input type="text"  class="form-control col-md-5" wire:model.defer="nombre" readonly="readonly">
    @error('nombre') <span class="text-warning">{{$message}}</span> @enderror
    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#addproducto" title="Agragar producto">
        <i class="fas fa-search fa-fw"></i>
    </button>
</div>




<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcion"  rows="3" readonly="readonly"></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="precioa" class="col-5 text-white">Precio actual</label>
    <input type="number" wire:model.defer="precioa" placeholder="0.00"  min="0" step="0.01" readonly="readonly"  pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5">
    @error('precioa') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="precioe" class="col-5 text-white">Precio de entrada</label>
    <input type="number" wire:model.defer="precioe" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5">
    @error('precioe') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stocka" class="col-5 text-white">Stock actual</label>
    <input type="number" wire:model.defer="stocka" class="form-control col-md-5"  placeholder="0"  min="0" readonly="readonly">
    @error('stocka') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stocke" class="col-5 text-white">Stock de entrada</label>
    <input type="number" wire:model.defer="stocke" class="form-control col-md-5"  placeholder="0"  min="0" wire:change="change">
    @error('stocke') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stockt" class="col-5 text-white">Stock total</label>
    <input type="number" wire:model.defer="stockt" class="form-control col-md-5"  placeholder="0"  min="0" readonly="readonly">
    @error('stockt') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcione" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcione"  rows="3"></textarea>
    @error('descripcione') <span class="text-warning">{{$message}}</span> @enderror
</div>







