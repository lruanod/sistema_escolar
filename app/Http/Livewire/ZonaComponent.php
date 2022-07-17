<?php

namespace App\Http\Livewire;

use App\Models\Maestrocurso;
use App\Models\Zona;
use App\Models\Zonaevaluacion;
use Livewire\Component;
use Livewire\WithPagination;

class ZonaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $zona_id,$zestado,$zona,$total,$aspecto, $estudiantecurso_id,$evaluacion,$buscar;
    public $zonaevaluacion_id,$bimestre,$zepunteo;
    public $maestro_id;
    public $enombre,$gnombre,$cnombre;

    public function mount(){
        $this->maestro_id=session()->get('maestro_id');
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
            join('maestrocursos','estudiantecursos.curso_id','maestrocursos.curso_id')->
            where('estudiantecursos.curso_id','=',$this->buscar)->
            where('maestrocursos.estado','=','Habilitado')->
            where('maestrocursos.maestro_id','=',$this->maestro_id)->
            select("zonas.id as zonaid", "estudiantes.enombre","grados.gnombre", "grados.gseccion", "nivels.nnombre","zonas.aspecto","zonas.zona","zonas.evaluacion","zonas.total","zonas.zestado")->
            paginate(8,['*'],'zona');
        } else{
            return Zona::join('estudiantecursos','zonas.estudiantecurso_id','estudiantecursos.id')->
            join('cursos','estudiantecursos.curso_id','cursos.id')->
            join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
            join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
            join('grados','asignaciongrados.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            join('maestrocursos','estudiantecursos.curso_id','maestrocursos.curso_id')->
            where('maestrocursos.estado','=','Habilitado')->
            where('maestrocursos.maestro_id','=',$this->maestro_id)->
            select("zonas.id as zonaid", "estudiantes.enombre","grados.gnombre", "grados.gseccion", "nivels.nnombre","zonas.aspecto","zonas.zona","zonas.evaluacion","zonas.total","zonas.zestado")->
            paginate(8,['*'],'zona');
        }

    }
    public function render()
    {
        return view('livewire.zona-component',[
            'zonas' => $this->getZonasProperty(),
            'maestrocursos' => Maestrocurso::where('maestro_id','=',$this->maestro_id)->where('estado','=','Habilitado')->get(),
            'zonaevaluacions' => Zonaevaluacion::where('zona_id','=',$this->zona_id)->get()
        ]);
    }

    public function change(){
        $this->total=$this->zona + $this->aspecto + $this->evaluacion;
    }

    public function edit($id){
        $zona= Zona::find($id);
        $this->zona_id=$zona->id;
        $this->zestado=$zona->zestado;
        $this->zona=$zona->zona;
        $this->total=$zona->total;
        $this->aspecto=$zona->aspecto;
        $this->evaluacion=$zona->evaluacion;
        $this->estudiantecurso_id=$zona->estudiantecurso_id;
        $this->enombre=$zona->estudiantecurso->asignaciongrado->estudiante->enombre;
        $this->gnombre=$zona->estudiantecurso->curso->grado->gnombre;
        $this->cnombre=$zona->estudiantecurso->curso->cnombre;
    }
    public function editze($id){
        $zonaevaluacion= Zonaevaluacion::find($id);
        $this->zonaevaluacion_id=$zonaevaluacion->id;
        $this->bimestre=$zonaevaluacion->bimestre;
        $this->zepunteo=$zonaevaluacion->zepunteo;
        $this->zona_id=$zonaevaluacion->zona_id;
        $zona= Zona::find($this->zona_id);
        $this->enombre=$zona->estudiantecurso->asignaciongrado->estudiante->enombre;
        $this->gnombre=$zona->estudiantecurso->curso->grado->gnombre;
        $this->cnombre=$zona->estudiantecurso->curso->cnombre;
    }
    public  function verze($id){
       $zona= Zona::find($id);
       $this->zona_id=$zona->id;
       $this->enombre= $zona->estudiantecurso->asignaciongrado->estudiante->enombre;
       $this->gnombre= $zona->estudiantecurso->curso->grado->gnombre;;
       $this->cnombre= $zona->estudiantecurso->curso->cnombre;
    }

    public function update(){
        $this->validate([
            'zestado'=> 'required|string|max:45',
            'zona'=> 'required|numeric|min:0',
            'total'=> 'required|numeric|min:0',
            'aspecto'=> 'required|numeric|min:0',
            'estudiantecurso_id'=> 'required|integer'
        ]);

        $zona= Zona::find($this->zona_id);
        $zona->update([
            'zestado'=> $this->zestado,
            'zona'=> $this->zona,
            'total'=> $this->total,
            'aspecto'=> $this->aspecto,
        ]);
        $this->msjedit();
        $this->default();
    }

    public function updateze(){
        $this->validate([
            'bimestre'=> 'required|string|max:45',
            'zepunteo'=> 'required|numeric|min:0'
        ]);

        $zonae= Zonaevaluacion::find($this->zonaevaluacion_id);
        $zonae->update([
            'bimestre'=> $this->bimestre,
            'zepunteo'=> $this->zepunteo,
        ]);

        $sumazona= Zonaevaluacion::where('zona_id','=',$this->zona_id)->sum('zepunteo');
        $zona= Zona::find($this->zona_id);
       // $tevaluacion=0;
      //  $tevaluacion=($zona->evaluacion);
        $zona->evaluacion=$sumazona;
        $zona->save();

        $this->msjedit2();
        $this->default();
    }

    public function default(){
        $this->zestado='';
        $this->zona='';
        $this->total='';
        $this->aspecto='';
        $this->estudiantecurso_id='';
        $this->evaluacion='';

        $this->bimestre='';
        $this->zepunteo='';
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Zona editada correctamente']);
    }

    public function msjedit2(){
        $this->dispatchBrowserEvent('alertze',['message'=>'Nota de evaluación editada correctamente']);
    }
}
