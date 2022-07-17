<?php

namespace App\Http\Livewire;


use App\Models\Entregatarea;
use App\Models\Estudiante;
use App\Models\Estudiantearchivo;
use App\Models\Estudiantecurso;
use App\Models\Maestroarchivo;
use App\Models\Maestrocurso;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class EntregatareaComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $entregatarea_id,$enfecha,$calificacion,$endescripcion,$tarea_id,$tarea_id2,$estudiantecurso_id,$edescripcion,$inicio,$fin,$ec_id,$curso_id;
    public $ngrado,$nnivel,$ncurso,$titulo,$punteo;
    public $eurl, $eurl2,$eurl3, $identificador3,$identificador4,$maestrocurso_id, $estudiantearchivo_id;
    public $estudiante_id;
    public $buscar;

    public function mount($ec_id =null){
        $this->ec_id =$ec_id;
        $this->curso_id=$ec_id;
        $this->estudiante_id=session()->get('estudiante_id');

        $estudiantecursos= Estudiantecurso::join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->join('cursos','estudiantecursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->join('nivels','grados.nivel_id','nivels.id')->where('estudiantecursos.curso_id','=',$ec_id)->where('asignaciongrados.estudiante_id','=',$this->estudiante_id)->
        select("estudiantecursos.id as estudiantecursosid","grados.gnombre as gnombre","nivels.nnombre as nnombre","cursos.cnombre as cnombre","cursos.id as curso_id")->get();
      // $estudiantecursos= Estudiantecurso::find($id);
        foreach ( $estudiantecursos as $cu){
            $this->ngrado = $cu->gnombre;
            $this->nnivel = $cu->nnombre;
            $this->estudiantecurso_id=$cu->estudiantecursosid;
            $this->ncurso =$cu->cnombre;
            $this->curso_id=$cu->curso_id;
        }
        $maestroscursos= Maestrocurso::where('curso_id','=',$ec_id)->get();
        foreach ( $maestroscursos as $mcu){
           $this->maestrocurso_id=$mcu->id;
        }

        $this->identificador3 = rand();
        $this->identificador4 = rand();
    }
    public function getTareasProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Tarea::join('maestrocursos','tareas.maestrocurso_id','maestrocursos.id')->join('cursos','maestrocursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->join('nivels','grados.nivel_id','nivels.id')->whereBetween('tareas.ffinalizacion',array($this->inicio,$this->fin))->where('maestrocursos.curso_id','=',$this->curso_id)->select("tareas.id as tareaid","tareas.ffinalizacion","tareas.fcreado","tareas.titulo","tareas.tdescripcion","tareas.punteo","cursos.cnombre","grados.gnombre","nivels.nnombre")->paginate(8,['*'],'tarea');
        } else{
            return Tarea::join('maestrocursos','tareas.maestrocurso_id','maestrocursos.id')->join('cursos','maestrocursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->join('nivels','grados.nivel_id','nivels.id')->where('maestrocursos.curso_id','=',$this->curso_id)->orderBy("tareas.created_at", "desc")->select("tareas.id as tareaid","tareas.ffinalizacion","tareas.fcreado","tareas.titulo","tareas.tdescripcion","tareas.punteo","cursos.cnombre","grados.gnombre","nivels.nnombre")->paginate(8,['*'],'tarea');
        }

    }

    public function render()
    {
        return view('livewire.entregatarea-component',[
            'tareas' => $this->getTareasProperty(),
            'maestroarchivos'=> Maestroarchivo::join('maestrocursos','maestroarchivos.maestrocurso_id','maestrocursos.id')->where('maestrocursos.curso_id','=',$this->curso_id)->get(),
            'estudiantearchivos'=> Estudiantearchivo::join('estudiantecursos','estudiantearchivos.estudiantecurso_id','estudiantecursos.id')->join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->where('estudiantecursos.curso_id','=',$this->curso_id)->where('asignaciongrados.estudiante_id','=',$this->estudiante_id)->select("estudiantearchivos.id as idd","estudiantearchivos.eurl as eurl","estudiantearchivos.etitulo as etitulo","estudiantearchivos.entregatarea_id as entregatarea_id","estudiantearchivos.estudiantecurso_id as estudiantecurso_id","asignaciongrados.estudiante_id")->get(),
            'entregatareas'=>Entregatarea:: where('entregatareas.tarea_id','=',$this->tarea_id2)->get()

            ]);
    }
    public function asig($id){
        $tarea= Tarea::find($id);
        $this->tarea_id=$tarea->id;
        $this->titulo=$tarea->titulo;
        $this->punteo=$tarea->punteo;
    }
    public function store(){
        $this->validate([
            'tarea_id'=> 'required|integer',
            'estudiantecurso_id'=> 'required|integer',
            'eurl.*'=> 'required|max:5048',
            'edescripcion'=> 'required|string|max:500'
        ]);
        Entregatarea::create([
            'enfecha'=> now(),
            'calificacion'=> 0,
            'endescripcion'=> '',
            'tarea_id'=> $this->tarea_id,
            'estudiantecurso_id'=>$this->estudiantecurso_id,
            'edescripcion' => $this->edescripcion
        ]);

        $ens=  Entregatarea::where('estudiantecurso_id', '=', $this->estudiantecurso_id)->where('tarea_id', '=', $this->tarea_id)->latest()->take(1)->get();
        foreach ($ens as $en){
            $this->entregatarea_id=$en->id;
        }

        foreach ($this->eurl as $key => $archivo){
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            // $image= $this->iurl->store('portadas','public');
            $nombre=$this->eurl[$key]->getClientOriginalName();
            $archivo= $this->eurl[$key]->store('archivos','public');
            /*fin*/
            Estudiantearchivo::create([
                'eurl'=> $archivo,
                'etitulo'=> $nombre,
                'entregatarea_id'=> $this->entregatarea_id,
                'estudiantecurso_id'=> $this->estudiantecurso_id
            ]);
        }
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $estudiantearchivo= Estudiantearchivo::find($id);
        $this->entregatarea_id=$estudiantearchivo->entregatarea_id;

        //$this->ngrado=$estudiantearchivo->estudiantecurso->curso->grado->gnombre;
        //$this->nnivel=$estudiantearchivo->estudiantecurso->curso->grado->nivel->nnombre;
        $this->tarea_id=$estudiantearchivo->entregatarea->tarea_id;
        $this->titulo=$estudiantearchivo->entregatarea->tarea->titulo;
        $this->edescripcion=$estudiantearchivo->entregatarea->edescripcion;
        $this->endescripcion = '';
        $this->calificacion = 0;
        $this->estudiantecurso_id=$estudiantearchivo->estudiantecurso_id;
        //$this->ncurso=$estudiantearchivo->estudiantecurso->curso->cnombre;
        $this->estudiantearchivo_id=$estudiantearchivo->id;
    }

    public function update(){
        $this->validate([
            'tarea_id'=> 'required|integer',
            'estudiantecurso_id'=> 'required|integer',
            'edescripcion'=> 'required|string|max:500',
        ]);

        $entregatarea= Entregatarea::find($this->entregatarea_id);
        $entregatarea->update([
            'enfecha'=> now(),
            'tarea_id'=> $this->tarea_id,
            'estudiantecurso_id'=> $this->estudiantecurso_id,
            'edescripcion' => $this->edescripcion
        ]);

        $ea= Estudiantearchivo::find($this->estudiantearchivo_id);
        if(!empty($this->eurl2)){
                // eliminar archivo existente
                Storage::disk('public')->delete($ea->eurl);
                //eliminar
                /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
                $archivo= $this->eurl2->store('archivos','public');
                $nombre=$this->eurl2->getClientOriginalName();
                /*fin*/
            $ea->update([
                    'eurl'=> $archivo,
                    'etitulo'=> $nombre,
                    'entregatarea_id'=> $this->entregatarea_id,
                    'estudiantecurso_id'=> $this->estudiantecurso_id
                ]);
        } else{
            $ea->update([
                'entregatarea_id'=> $this->entregatarea_id,
                'estudiantecurso_id'=> $this->estudiantecurso_id
            ]);
        }

        $this->msjedit();
        $this->default();

    }

    public function destroy($id,$eid){
       $estudiantearchivo= Estudiantearchivo::where('entregatarea_id','=',$eid)->get();
        foreach ($estudiantearchivo as $ear){
            // eliminar archivo existente
            Storage::disk('public')->delete($ear->eurl);
            //eliminar
            Estudiantearchivo::destroy($ear->id);
        }
            Entregatarea::destroy($eid);
            $this->msjdelete();
    }

    public function vercali($id){
        $this->tarea_id2=$id;
    }

    public function default(){
        $this->enfecha = '';
        $this->calificacion='';
        $this->endescripcion='';
        $this->tarea_id='';
        $this->tarea_id2='';
        $this->estudiantecurso_id='';

        $this->eurl='';
        $this->entregatarea_id='';
        $this->estudiantecurso_id='';
        $this->entregatarea_id='';
        $this->fin='';
        $this->inicio='';
        $this->titulo='';
        $this->punteo='';
        $this->edescripcion='';


        $this->eurl2='';
        $this->eurl3='';
        $this->identificador3='';
        $this->identificador4='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Tarea registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Tarea editada correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Archivo eliminado correctamente']);
    }


}
