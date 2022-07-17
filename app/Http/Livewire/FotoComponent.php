<?php

namespace App\Http\Livewire;

use App\Models\Estudiante;
use App\Models\Maestro;
use App\Models\Padre;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class FotoComponent extends Component
{
    use WithPagination,WithFileUploads;
    public $u_id,$galbum,$gfecha,$ndescripcion;
    public $imagen_id,$url, $iurl2,$iurl3;
    public $buscar, $estudiante_id,$padre_id,$maestro_id;


    public function  mount(){
        $this->estudiante_id=session()->get('estudiante_id');
        $this->maestro_id=session()->get('maestro_id');
        $this->padre_id=session()->get('padre_id');
        $this->identificador = rand();
        $this->identificador2 = rand();
    }
    public function render()
    {
        return view('livewire.foto-component');
    }

    public function save(){
        $this->validate([
            'url'=> 'required|image|max:2048',
        ]);
        if($this->estudiante_id){
            $estudiante= Estudiante::find($this->estudiante_id);
            if(!empty($this->url)){
                // eliminar archivo existente
                Storage::disk('public')->delete($estudiante->eurl);
                //eliminar

                /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
                $image= $this->url->store('portadas','public');
                /*fin*/
                $estudiante->update([
                    'eurl'=> $image,
                ]);
            }
        }
        if ($this->maestro_id){
            $maestro= Maestro::find($this->maestro_id);
            if(!empty($this->url)){
                // eliminar archivo existente
                Storage::disk('public')->delete($maestro->murl);
                //eliminar

                /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
                $image= $this->url->store('portadas','public');
                /*fin*/
                $maestro->update([
                    'murl'=> $image,
                ]);
            }
        }
        if ($this->padre_id){
            $padre= Padre::find($this->padre_id);
            if(!empty($this->url)){
                // eliminar archivo existente
                Storage::disk('public')->delete($padre->purl);
                //eliminar

                /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
                $image= $this->url->store('portadas','public');
                /*fin*/
                $padre->update([
                    'purl'=> $image,
                ]);
            }
        }

        $this->msjexito();
        $this->default();
    }

    public function default(){

        $this->url = '';
        $this->url2 = '';
        $this->identificador = rand();
        $this->identificador2 = rand();

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Foto de perfil actualizada correctamente']);
    }
}
