<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Curso;
use App\Models\Estudiantecurso;
use Livewire\Component;
use Livewire\WithPagination;

class EactividadComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $estudiante_id;
    public $buscar;

    public function getAsignaciongradosProperty(){
        $this->estudiante_id=session()->get('estudiante_id');
        $busqueda='%'.$this->buscar.'%';
        return Estudiantecurso::join('cursos','estudiantecursos.curso_id','cursos.id')->join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->where('cursos.cnombre','like',$busqueda)->where('asignaciongrados.estudiante_id','=',$this->estudiante_id)->paginate(8,['*'],'estudiantecurso');
    }
    public function render()
    {
        return view('livewire.eactividad-component',[
            'estudiantecursos' => $this->getAsignaciongradosProperty(),
        ]);
    }
}
