<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Galeria;
use App\Models\Imagen;
use Livewire\Component;
use Livewire\WithPagination;
Use Storage;

class WelcomeComponent extends Component
{     use WithPagination;
    protected $paginationTheme ="bootstrap";


    public $cita_id,$cinombre,$cifecha,$cicorreo,$cicel,$cidescripcion,$ciestado;

    public function render()
    {
        return view('livewire.welcome-component',[
            'imagenes'=>  Imagen::join('galerias','galeria_id','galerias.id')->paginate(8,['*'],'imagen')
        ]);
    }

    public function store(){
        $this->validate([
            'cinombre'=> 'required',
            'cifecha'=> 'required',
            'cicorreo'=> 'required|email|max:75',
            'cicel'=> 'required|string|max:10',
            'cidescripcion'=> 'required|string|max:500',
        ]);
        Cita::create([
            'cinombre'=> $this->cinombre,
            'cifecha'=> $this->cifecha,
            'cicorreo'=> $this->cicorreo,
            'cicel'=> $this->cicel,
            'cidescripcion'=>$this->cidescripcion,
            'ciestado'=> "Solicitado",
        ]);
        $this->msjexito();
        $this->default();
    }

    public function default(){
        $this->cinombre = '';
        $this->cifecha='';
        $this->cicorreo='';
        $this->cicel='';
        $this->cidescripcion='';
        $this->ciestado = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'cita registrada correctamente']);
    }

}
