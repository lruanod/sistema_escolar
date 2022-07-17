<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use App\Models\Grado;
use App\Models\Padre;
use Livewire\Component;
use Livewire\WithPagination;

class CursoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $curso_id,$cnombre, $grado_id;
    public $buscar;

    public function getCursosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Curso::where('cnombre','like',$busqueda)->paginate(8,['*'],'curso');
    }
    public function render()
    {
        return view('livewire.curso-component',[
            'cursos' => $this->getCursosProperty(),
            'grados'=> Grado::all()
        ]);
    }
    public function store(){
        $this->validate([
            'cnombre'=> 'required|string|max:65',
            'grado_id'=> 'required|integer',
        ]);
        Curso::create([
            'cnombre'=> $this->cnombre,
            'grado_id'=> $this->grado_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $curso= Curso::find($id);
        $this->curso_id = $curso->id;
        $this->cnombre = $curso->cnombre;
        $this->grado_id = $curso->grado->id;

    }

    public function update(){
        $this->validate([
            'cnombre'=> 'required|string|max:65',
            'grado_id'=> 'required|integer'
        ]);

        $curso= Curso::find($this->curso_id);
        $curso->update([
            'cnombre'=> $this->cnombre,
            'grado_id'=> $this->grado_id,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->cnombre = '';
        $this->grado_id='';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Curso registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Curso editado correctamente']);
    }
}
