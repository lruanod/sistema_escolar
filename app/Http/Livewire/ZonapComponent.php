<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Estudiantecurso;
use App\Models\Zona;
use App\Models\Zonaevaluacion;
use Livewire\Component;
use Livewire\WithPagination;

class ZonapComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $zona_id, $buscar;
    public $estudiante_id, $padre_id;

    public function mount(){
        $this->padre_id=session()->get('padre_id');
       // $estudiantecursos = Estudiantecurso::where('id','=',$esc_id)->get();
       // foreach ( $estudiantecursos as $escu){
       //     $this->curso_id = $escu->curso_id;
       //     $this->estudiante_id= $escu->asignaciongrado->estudiante_id;
       // }
        $this->buscar="";
    }
    public function getZonasProperty(){
        if(!empty($this->buscar)) {
            return Zona::join('estudiantecursos','zonas.estudiantecurso_id','estudiantecursos.id')->
            join('cursos','estudiantecursos.curso_id','cursos.id')->
            join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
            join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('padresestudiantes','estudiantes.id','padreestudiantes.estudiante_id')->
            join('padres','padresestudiantes.padre_id','padres.id')->
            join('grados','asignaciongrados.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            where('asignaciongrados.grado_id','=',$this->buscar)->
            where('asignaciongrados.estado','=','Habilitado')->
            where('padres.id','=',$this->padre_id)->
            select("zonas.id as zonaid", "cursos.cnombre","grados.gnombre", "grados.gseccion", "nivels.nnombre","zonas.aspecto","zonas.zona","zonas.evaluacion","zonas.total","zonas.zestado","padresestudiantes.estudiante_id","estudiantes.enombre")->
            paginate(8,['*'],'zona');
        } else{
            return Zona::join('estudiantecursos','zonas.estudiantecurso_id','estudiantecursos.id')->
            join('cursos','estudiantecursos.curso_id','cursos.id')->
            join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
            join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('padresestudiantes','estudiantes.id','padresestudiantes.estudiante_id')->
            join('padres','padresestudiantes.padre_id','padres.id')->
            join('grados','asignaciongrados.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            where('asignaciongrados.estado','=','Habilitado')->
            where('padres.id','=',$this->padre_id)->
            select("zonas.id as zonaid", "cursos.cnombre","grados.gnombre", "grados.gseccion", "nivels.nnombre","zonas.aspecto","zonas.zona","zonas.evaluacion","zonas.total","zonas.zestado","padresestudiantes.estudiante_id","estudiantes.enombre")->
            paginate(8,['*'],'zona');
        }

    }


    public function render()
    {
        return view('livewire.zonap-component',[
            'zonas' => $this->getZonasProperty(),
            'asignaciongrados' => Asignaciongrado::join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('padresestudiantes','estudiantes.id','padresestudiantes.estudiante_id')->
            join('padres','padresestudiantes.padre_id','padres.id')->
            where('padres.id','=',$this->padre_id)->where('asignaciongrados.estado','=','Habilitado')->get(),
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
