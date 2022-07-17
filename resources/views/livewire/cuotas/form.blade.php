

<div class="row form-group">
    <label for="" class="col-5 text-white" >Mes</label>
    <select class="form-control col-md-5" wire:model="mes">
        <option value="">Seleccionar Mes</option>
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
    </select>
    @error('mes') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="fin" class="col-5 text-white">Estudiante</label>
    <input type="text" class="form-control col-md-5" wire:model="enombre" readonly="readonly">

    <button class="btn btn-info text-white" data-toggle="modal" data-target="#addestudiante" title="Buscar estudiante">
        <i class="fas fa-search fa-fw"></i>
    </button>
</div>

<div class="row form-group">
    <label for="grado" class="col-5 text-white">Grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="grado" readonly="readonly">
    @error('grado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="grado" class="col-5 text-white">Nivel</label>
    <input type="text"  class="form-control col-md-5" wire:model="nivel" readonly="readonly">
    @error('nivel') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="abono" class="col-5 text-white">Abono</label>
    <input type="number" wire:model="abono" placeholder="0.00"  readonly="readonly" min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('abono') <span class="text-warning">{{$message}}</span> @enderror
</div>










