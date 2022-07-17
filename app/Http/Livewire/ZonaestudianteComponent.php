<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Zona;
use App\Models\Zonaevaluacion;
use Livewire\Component;
use Livewire\WithPagination;

class ZonaestudianteComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $zona_id, $buscar;
    public $estudiante_id;

    public function mount(){
        $this->estudiante_id=session()->get('estudiante_id');
        $this->buscar="";
    }
    public function getZonasProperty(){
        if(!empty($this->buscar)) {
            return Zona::join('estudiantecursos','zonas.estudiantecurso_id','estudiantecursos.id')->
            join('cursos','estudiantecursos.curso_id','cursos.id')->
            join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
            join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('grados','asignaciongrados.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            where('asignaciongrados.grado_id','=',$this->buscar)->
            where('asignaciongrados.estado','=','Habilitado')->
            where('asignaciongrados.estudiante_id','=',$this->estudiante_id)->
            select("zonas.id as zonaid", "cursos.cnombre","grados.gnombre", "grados.gseccion", "nivels.nnombre","zonas.aspecto","zonas.zona","zonas.evaluacion","zonas.total","zonas.zestado")->
            paginate(8,['*'],'zona');
        } else{
            return Zona::join('estudiantecursos','zonas.estudiantecurso_id','estudiantecursos.id')->
            join('cursos','estudiantecursos.curso_id','cursos.id')->
            join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
            join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('grados','asignaciongrados.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            where('asignaciongrados.estado','=','Habilitado')->
            where('asignaciongrados.estudiante_id','=',$this->estudiante_id)->
            select("zonas.id as zonaid", "cursos.cnombre","grados.gnombre", "grados.gseccion", "nivels.nnombre","zonas.aspecto","zonas.zona","zonas.evaluacion","zonas.total","zonas.zestado")->
            paginate(8,['*'],'zona');
        }

    }


    public function render()
    {
        return view('livewire.zonaestudiante-component',[
            'zonas' => $this->getZonasProperty(),
            'asignaciongrados' => Asignaciongrado::where('estudiante_id','=',$this->estudiante_id)->where('estado','=','Habilitado')->get(),
            'zonaevaluacions' => Zonaevaluacion::where('zona_id','=',$this->zona_id)->get()
        ]);
    }

    public  function verze($id){
        $zona= Zona::find($id);
        $this->zona_id=$zona->id;
    }

    public  function  default(){
        $this->zona_id="";
    }

}
