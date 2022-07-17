<?php

namespace App\Http\Livewire;

use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Padre;
use Livewire\Component;
use Livewire\WithPagination;

class GradoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $nivel_id,$gnombre,$gseccion, $grado_id,$monto;
    public $buscar;

    public function getGradosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Grado::where('gnombre','like',$busqueda)->paginate(8,['*'],'grado');
    }
    public function render()
    {
        return view('livewire.grado-component',[
            'grados' => $this->getGradosProperty(),
            'nivels'=> Nivel::all()
        ]);
    }
    public function store(){
        $this->validate([
            'gnombre'=> 'required|string|max:45',
            'gseccion'=> 'required|string|max:45',
            'monto'=> 'required|numeric|min:0',
            'nivel_id'=> 'required|integer',
        ]);
        Grado::create([
            'gnombre'=> $this->gnombre,
            'gseccion'=> $this->gseccion,
            'monto'=> $this->monto,
            'nivel_id'=> $this->nivel_id,
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $grado= Grado::find($id);
        $this->grado_id = $grado->id;
        $this->gnombre = $grado->gnombre;
        $this->gseccion = $grado->gseccion;
        $this->monto= $grado->monto;
        $this->nivel_id = $grado->nivel_id;
    }

    public function update(){
        $this->validate([
            'gnombre'=> 'required|string|max:45',
            'gseccion'=> 'required|string|max:45',
            'monto'=> 'required|numeric|min:0',
            'nivel_id'=> 'required|integer',
        ]);

        $grado= Grado::find($this->grado_id);
        $grado->update([
            'gnombre'=> $this->gnombre,
            'gseccion'=> $this->gseccion,
            'monto'=> $this->monto,
            'nivel_id'=> $this->nivel_id,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->gnombre = '';
        $this->gseccion = '';
        $this->nivel_id = '';
        $this->monto='';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Grado académico registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Grado académico editado correctamente']);
    }
}
