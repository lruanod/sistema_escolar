


<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre del producto</label>
    <input type="text"  class="form-control col-md-5" wire:model="nombre" readonly="readonly">
</div>

<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripcion</label>
    <textarea class="form-control col-md-5" wire:model="descripcion"  rows="3" readonly="readonly"></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cantidad" class="col-5 text-white">Cantidad</label>
    <input type="number" wire:model.defer="cantidad" class="form-control col-md-5"  placeholder="0"  min="0" wire:change="change" >
    @error('cantidad') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="precio" class="col-5 text-white">Precio</label>
    <input type="number" wire:model="precio" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('precio') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descuento" class="col-5 text-white">Descuento</label>
    <input type="number" wire:model="descuento" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('descuento') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="subtotal" class="col-5 text-white">Total</label>
    <input type="number" wire:model="subtotal" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('subtotal') <span class="text-warning">{{$message}}</span> @enderror
</div>










