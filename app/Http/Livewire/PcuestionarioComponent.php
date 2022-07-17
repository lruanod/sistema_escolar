<?php

namespace App\Http\Livewire;

use App\Models\Cuestionario;
use App\Models\Cuestionarioestudiante;
use App\Models\Estudiantecurso;
use App\Models\Maestrocurso;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Respuestaestudiante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PcuestionarioComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $cuestionario_id,$fcreado,$ffinalizacion,$titulo,$punteo, $maestrocurso_id,$inicio,$fin,$ec_id,$cestado, $cues;
    public $ngrado,$nnivel,$ncurso,$totalpunteo,$respuesta,$identificador;
    public $curso_id;
    public $pregunta_id,$pregunta,$tipo,$ppunteo;
    public $cuestionarioestudiante_id,$erespuesta,$restado;
    public $buscar, $estudiante_id, $esc_id, $padre_id;


    public function mount($esc_id =null){
        $this->padre_id=session()->get('padre_id');
        $this->esc_id =$esc_id;
        $estudiantecursos = Estudiantecurso::where('id','=',$esc_id)->get();
        foreach ( $estudiantecursos as $escu){
            $this->curso_id = $escu->curso_id;
            $this->estudiante_id= $escu->asignaciongrado->estudiante_id;
        }
        $cursos = Maestrocurso::where('curso_id','=',$this->curso_id)->get();
        foreach ( $cursos as $curso){
            $this->ngrado = $curso->curso->grado->gnombre;
            $this->nnivel = $curso->curso->grado->nivel->nnombre;
            $this->ncurso =$curso->curso->cnombre;
            $this->maestrocurso_id=$curso->id;
        }
    }
    public function getCuestionariosProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Cuestionario::join('maestrocursos','cuestionarios.maestrocurso_id','maestrocursos.id')->
            join('cursos','maestrocursos.curso_id','cursos.id')->
            join('grados','cursos.grado_id','grados.id')->
            whereBetween('cuestionarios.ffinalizacion',array($this->inicio,$this->fin))->
            where('maestrocursos.curso_id','=',$this->curso_id)->
            where('cuestionarios.cestado','=','Habilitado')->
            select("cuestionarios.id as cid","cuestionarios.ffinalizacion","cuestionarios.fcreado","cuestionarios.titulo","cuestionarios.cdescripcion","cuestionarios.cestado","cuestionarios.punteo","cursos.cnombre","grados.gnombre")->paginate(8,['*'],'cuestionario');
        } else{
            return Cuestionario::join('maestrocursos','cuestionarios.maestrocurso_id','maestrocursos.id')->
            join('cursos','maestrocursos.curso_id','cursos.id')->
            join('grados','cursos.grado_id','grados.id')->
            orderBy("cuestionarios.created_at", "desc")->
            where('maestrocursos.curso_id','=',$this->curso_id)->
            where('cuestionarios.cestado','=','Habilitado')->
            select("cuestionarios.id as cid","cuestionarios.ffinalizacion","cuestionarios.fcreado","cuestionarios.titulo","cuestionarios.cdescripcion","cuestionarios.cestado","cuestionarios.punteo","cursos.cnombre","grados.gnombre")->paginate(8,['*'],'cuestionario');
        }

    }
    public function render()
    {
        return view('livewire.pcuestionario-component',[
            'cuestionarios' => $this->getCuestionariosProperty(),
            'preguntas'=> Pregunta::where('cuestionario_id','=',$this->cuestionario_id)->get(),
            'respuestas'=> Respuesta::where('maestrocurso_id','=',$this->maestrocurso_id)->get(),
            'respuestaestudiantes' =>Respuestaestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('cuestionarioestudiante_id','=',$this->cuestionarioestudiante_id)->get(),
            'punteos'=> Cuestionarioestudiante::join('cuestionarios','cuestionarioestudiantes.cuestionario_id','cuestionarios.id')->where('cuestionarioestudiantes.cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->select("cuestionarios.punteo","cuestionarioestudiantes.cepunteo")->get()
        ]);
    }

    public function cuestionario($id){
        $cuestionario= Cuestionario::find($id);
        $this->cuestionario_id=$cuestionario->id;
        if(Cuestionarioestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->count() > 0){
            $cuestionarioestudiantes= Cuestionarioestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->take(1)->get();
            foreach ($cuestionarioestudiantes as $ces){
                $this->cuestionarioestudiante_id=$ces->id;
            }
        }
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'La Respuesta correcta']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'La Respuesta Incorrecta']);
    }
    public function msjalerta(){
        $this->dispatchBrowserEvent('alert3',['message'=>'El cuestionario esta cerrado']);
    }
    public function msjverificar(){
        $this->dispatchBrowserEvent('alert2',['message'=>'La Respuesta sera verificada']);
    }
}
