
<div class="row form-group">
    <label for="iurl2" class="col-5 text-white">Imagen</label>
    <input type="file" class="form-control col-md-5" wire:model="iurl2" id="{{$identificador2}}">
    @error('iurl2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="galbum2" class="col-5 text-white">Album</label>
    <input type="text" class="form-control col-md-5" wire:model="galbum2" readonly="readonly">
    @error('galbum2') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="card-body align-content-center">
    <div wire:loading wire:target="iurl2" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($iurl2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$iurl2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($iurl3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$iurl3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>
