<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Estudiantecurso;
use Livewire\Component;
use Livewire\WithPagination;

class PactividadComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $padre_id;
    public $buscar;

    public function mount(){
        $this->padre_id=session()->get('padre_id');
        $this->buscar="";
    }

    public function getAsignaciongradosProperty()
    {
        if (!empty($this->buscar)) {
            return Estudiantecurso::join('cursos', 'estudiantecursos.curso_id', 'cursos.id')->
            join('asignaciongrados', 'estudiantecursos.asignaciongrado_id', 'asignaciongrados.id')->
            join('estudiantes', 'asignaciongrados.estudiante_id', 'estudiantes.id')->
            join('grados', 'asignaciongrados.grado_id', 'grados.id')->
            join('padresestudiantes', 'asignaciongrados.estudiante_id', 'padresestudiantes.estudiante_id')->
            join('padres', 'padresestudiantes.padre_id', 'padres.id')->
            join('nivels', 'grados.nivel_id', 'nivels.id')->
            where('asignaciongrados.grado_id', '=', $this->buscar)->
            where('padres.id','=', $this->padre_id)->
            select("estudiantecursos.id as estudiantecursoid","estudiantes.enombre","estudiantes.id as estudianteid",
                "cursos.cnombre","cursos.id as cursoid","grados.gnombre","grados.gseccion","nivels.nnombre","asignaciongrados.fecha")->
            paginate(8,['*'],'estudiantecurso');
        } else{
            return Estudiantecurso::join('cursos', 'estudiantecursos.curso_id', 'cursos.id')->
            join('asignaciongrados', 'estudiantecursos.asignaciongrado_id', 'asignaciongrados.id')->
            join('estudiantes', 'asignaciongrados.estudiante_id', 'estudiantes.id')->
            join('grados', 'asignaciongrados.grado_id', 'grados.id')->
            join('padresestudiantes', 'asignaciongrados.estudiante_id', 'padresestudiantes.estudiante_id')->
            join('padres', 'padresestudiantes.padre_id', 'padres.id')->
            join('nivels', 'grados.nivel_id', 'nivels.id')->
            where('padres.id','=', $this->padre_id)->
            select("estudiantecursos.id as estudiantecursoid","estudiantes.enombre","estudiantes.id as estudianteid",
                "cursos.cnombre","cursos.id as cursoid","grados.gnombre","grados.gseccion","nivels.nnombre","asignaciongrados.fecha")->
            paginate(8,['*'],'estudiantecurso');
        }
    }
    public function render()
    {
        return view('livewire.pactividad-component',[
            'estudiantecursos' => $this->getAsignaciongradosProperty(),
            'asignaciongrados' => Asignaciongrado::join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('padresestudiantes','asignaciongrados.estudiante_id','padresestudiantes.estudiante_id')->
            where('padresestudiantes.padre_id','=',$this->padre_id)->get()
        ]);
    }
}
