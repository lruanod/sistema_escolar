<?php

namespace App\Http\Livewire;


use App\Models\Galeria;
use App\Models\Imagen;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class AlbumComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $galeria_id,$galbum,$gfecha,$ndescripcion;
    public $imagen_id,$iurl =[], $iurl2,$iurl3, $galbum2;
    public $buscar;

    public function  mount(){
        $this->identificador = rand();
        $this->identificador2 = rand();
    }
    public function getAlbumsProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Galeria::where('galbum','like',$busqueda)->paginate(8,['*'],'galeria');
    }
    public function render()
    {
        return view('livewire.album-component',[
            'albums' => $this->getAlbumsProperty(),
            'asignars'=> Imagen::all()
        ]);
    }
    public function store(){
        $this->validate([
            'gfecha'=> 'required|date',
            'galbum'=> 'required|string|max:60',
            'ndescripcion'=> 'required|string|max:490',

        ]);
        Galeria::create([
            'gfecha'=> $this->gfecha,
            'galbum'=>$this->galbum,
            'ndescripcion'=> $this->ndescripcion
        ]);
        $this->msjexito();
        $this->default();
    }
    public function addasignar($id){
        $galeria=Galeria::find($id);
        $this->galbum2=$galeria->galbum;
        $this->galeria_id=$galeria->id;
    }
    public function regasignar(){
        $this->validate([
            'iurl.*'=> 'required|image|max:2048',
            'galeria_id'=> 'required|integer',
        ]);
        foreach ($this->iurl as $key => $image){
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            // $image= $this->iurl->store('portadas','public');
               $image= $this->iurl[$key]->store('portadas','public');
            /*fin*/
            Imagen::create([
                'iurl'=> $image,
                'galeria_id'=> $this->galeria_id
            ]);
        }

        $this->msjexito3();
        $this->default();
    }

    public function edit($id){
        $galeria= Galeria::find($id);
        $this->galeria_id = $galeria->id;
        $this->gfecha = $galeria->gfecha;
        $this->galbum = $galeria->galbum;
        $this->ndescripcion = $galeria->ndescripcion;
    }

    public function editasignar($id){
        $imagen= Imagen::find($id);
        $this->imagen_id = $imagen->id;
        $this->galeria_id = $imagen->galeria_id;
        $this->iurl3=$imagen->iurl;
        $this->galbum2 = $imagen->galeria->galbum;
    }

    public function update(){
        $this->validate([
            'gfecha'=> 'required|date',
            'galbum'=> 'required|string|max:60',
            'ndescripcion'=> 'required|string|max:490',
        ]);

        $galeria= Galeria::find($this->galeria_id);
        $galeria->update([
            'gfecha'=> $this->gfecha,
            'galbum'=>$this->galbum,
            'ndescripcion'=> $this->ndescripcion
        ]);
        $this->msjedit();
        $this->default();

    }

    public function updateasignar(){
        $this->validate([
            'galeria_id'=> 'required|integer',
        ]);

        $ima= Imagen::find($this->imagen_id);
        if(!empty($this->iurl2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($ima->iurl);
            //eliminar

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->iurl2->store('portadas','public');
            /*fin*/
            $ima->update([
                'iurl'=> $image,
                'galeria_id'=> $this->galeria_id
            ]);
        } else{
            $ima->update([
                'galeria_id'=> $this->galeria_id
            ]);
        }
        $this->msjedit3();
        $this->default();

    }

    public function default(){
        $this->gfecha = '';
        $this->galbum = '';
        $this->ndescripcion = '';
        $this->iurl = '';
        $this->iurl2 = '';
        $this->iurl3 = '';
        $this->galbum2 = '';
        $this->galeria_id = '';
        $this->buscar = '';
        $this->identificador = rand();
        $this->identificador2 = rand();

    }

    public function destroy($id){
        $imagen= Imagen::find($id);
        // eliminar archivo existente
        Storage::disk('public')->delete($imagen->iurl);
        //eliminar
        Imagen::destroy($id);
        $this->msjdelete();
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'ALbum registrado correctamente']);
    }

    public function msjexito3(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Fotografía registrada correctamente']);
    }
    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Abum editado correctamente']);
    }

    public function msjedit3(){
        $this->dispatchBrowserEvent('alerteditasignar',['message'=>'Fotografía editada correctamente']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Fotografía eliminada correctamente']);
    }
}
