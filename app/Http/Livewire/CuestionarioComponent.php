<?php

namespace App\Http\Livewire;

use App\Models\Administrador;
use App\Models\Cuestionario;
use App\Models\Cuestionarioestudiante;
use App\Models\Maestroarchivo;
use App\Models\Maestrocurso;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CuestionarioComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $cuestionario_id,$fcreado,$ffinalizacion,$cdescripcion,$titulo,$punteo, $maestrocurso_id,$inicio,$fin,$mc_id,$cestado, $cues;
    public $ngrado,$nnivel,$ncurso,$titulo2,$pregunta2,$identificador,$identificador2;
    public $pregunta_id,$pregunta,$tipo,$ppunteo;
    public $respuesta_id,$respuesta,$restado;
    public $reintento,$cantidadp;
    public $buscar;

    public function mount($mc_id =null){
        $this->mc_id =$mc_id;
        $this->maestrocurso_id=$mc_id;
        $maestrocuros = maestrocurso::where('id','=',$mc_id)->get();
        foreach ( $maestrocuros as $mcu){
            $this->ngrado = $mcu->curso->grado->gnombre;
            $this->nnivel = $mcu->curso->grado->nivel->nnombre;
            $this->ncurso =$mcu->curso->cnombre;
        }
    }
    public function getCuestionariosProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Cuestionario::whereBetween('ffinalizacion',array($this->inicio,$this->fin))->where('maestrocurso_id','=',$this->mc_id)->paginate(8,['*'],'cuestionario');
        } else{
            return Cuestionario::orderBy("created_at", "desc")->where('maestrocurso_id','=',$this->mc_id)->paginate(8,['*'],'cuestionario');
        }

    }
    public function render()
    {
        return view('livewire.cuestionario-component',[
            'cuestionarios' => $this->getCuestionariosProperty(),
            'preguntas'=> Pregunta::where('cuestionario_id','=',$this->cues)->get(),
            'respuestas'=> Respuesta::where('maestrocurso_id','=',$this->mc_id)->get(),
            'cuestionarioestudiantes'=> Cuestionarioestudiante::where('cuestionario_id','=',$this->cues)->get()
        ]);
    }
    public function store(){
        $this->validate([
            'fcreado'=> 'required',
            'ffinalizacion'=> 'required',
            'cdescripcion'=> 'required|string|max:500',
            'titulo'=> 'required|string|max:75',
            'cestado'=> 'required|string|max:45',
            'punteo'=> 'required|numeric|min:0',
            'reintento'=>'required|numeric|min:0',
            'cantidadp'=>'required|numeric|min:0'
        ]);
        Cuestionario::create([
            'fcreado'=> $this->fcreado,
            'ffinalizacion'=> $this->ffinalizacion,
            'cdescripcion'=> $this->cdescripcion,
            'cestado'=> $this->cestado,
            'titulo'=> $this->titulo,
            'punteo'=> $this->punteo,
            'maestrocurso_id'=> $this->maestrocurso_id,
            'reintento'=> $this->reintento,
            'cantidadp'=> $this->cantidadp
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $cuestinario= Cuestionario::find($id);
        $this->ngrado=$cuestinario->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$cuestinario->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id = $cuestinario->maestrocurso->id;
        $this->cuestionario_id= $cuestinario->id;
        $this->fcreado = $cuestinario->fcreado;
        $this->ffinalizacion = $cuestinario->ffinalizacion;
        $this->cdescripcion = $cuestinario->cdescripcion;
        $this->cestado = $cuestinario->cestado;
        $this->titulo = $cuestinario->titulo;
        $this->punteo = $cuestinario->punteo;
        $this->ncurso=$cuestinario->maestrocurso->curso->cnombre;
        $this->reintento=$cuestinario->reintento;
        $this->cantidadp=$cuestinario->cantidadp;
        $this->identificador=$cuestinario->fcreado;
        $this->identificador2=$cuestinario->ffinalizacion;
    }

    public function update(){
        $this->validate([
            'fcreado'=> 'required',
            'ffinalizacion'=> 'required',
            'cdescripcion'=> 'required|string|max:500',
            'cestado'=> 'required|string|max:75',
            'titulo'=> 'required|string|max:75',
            'punteo'=> 'required|numeric|min:0',
            'reintento'=>'required|numeric|min:0',
            'cantidadp'=>'required|numeric|min:0'
        ]);

        $cuestionario= Cuestionario::find($this->cuestionario_id);
        $cuestionario->update([
            'fcreado'=> $this->fcreado,
            'ffinalizacion'=> $this->ffinalizacion,
            'tdescripcion'=> $this->cdescripcion,
            'cestado'=> $this->cestado,
            'titulo'=> $this->titulo,
            'punteo'=> $this->punteo,
            'maestrocurso_id'=> $this->maestrocurso_id,
            'reintento'=> $this->reintento,
            'cantidadp'=> $this->cantidadp
        ]);
        $this->msjedit();
        $this->default();

    }

    public function addasignar($id){
        $cuestionario=Cuestionario::find($id);
        $this->titulo=$cuestionario->titulo;
        $this->ncurso=$cuestionario->maestrocurso->curso->cnombre;
        $this->ngrado=$cuestionario->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$cuestionario->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id=$cuestionario->maestrocurso_id;
        $this->cuestionario_id=$cuestionario->id;
    }
    public function verp($id){
        $cuestionario=Cuestionario::find($id);
        $this->cues=$cuestionario->id;
    }

    public function addasignar2($id){
        $pregunta=Pregunta::find($id);
        $this->pregunta2=$pregunta->pregunta;
        $this->titulo2=$pregunta->cuestionario->titulo;
        $this->ncurso=$pregunta->maestrocurso->curso->cnombre;
        $this->ngrado=$pregunta->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$pregunta->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id=$pregunta->maestrocurso_id;
        $this->pregunta_id=$pregunta->id;
        $this->cuestionario_id=$pregunta->cuestionario_id;
    }

    public function regasignar(){
        $this->validate([
            'pregunta'=> 'required|string|max:450',
            'tipo'=> 'required|string|max:45',
            'ppunteo'=> 'required|numeric|min:0',
            'cuestionario_id'=> 'required|integer',
            'maestrocurso_id'=> 'required|integer'
        ]);
            Pregunta::create([
                'pregunta'=> $this->pregunta,
                'tipo'=> $this->tipo,
                'ppunteo'=> $this->ppunteo,
                'cuestionario_id'=> $this->cuestionario_id,
                'maestrocurso_id'=> $this->maestrocurso_id,
            ]);

            $pregunta= Pregunta::Where('pregunta','=', $this->pregunta)->where('tipo','=',$this->tipo)->where('ppunteo','=',$this->ppunteo)->where('cuestionario_id','=',$this->cuestionario_id)->where('maestrocurso_id','=',$this->maestrocurso_id)->take(1)->get();
            foreach ($pregunta as $pr){
                if($this->tipo=='Abierta'){
                    Respuesta::create([
                        'respuesta'=> "Pendiente para calificar",
                        'restado'=> "Verificar",
                        'pregunta_id'=> $pr->id,
                        'maestrocurso_id'=> $this->maestrocurso_id,
                        'cuestionario_id'=> $pr->cuestionario_id
                    ]);
                }
            }



        $this->msjexito3();
        $this->default();
    }

    public function regasignar2(){
        $this->validate([
            'respuesta'=> 'required|string|max:450',
            'restado'=> 'required|string|max:45',
            'pregunta_id'=> 'required|integer',
            'maestrocurso_id'=> 'required|integer'
        ]);
        $pregunta=Pregunta::find($this->pregunta_id);
        $this->cuestionario_id=$pregunta->cuestionario_id;
        if($pregunta->tipo=="Cerrada"){
            Respuesta::create([
                'respuesta'=> $this->respuesta,
                'restado'=> $this->restado,
                'pregunta_id'=> $this->pregunta_id,
                'maestrocurso_id'=> $this->maestrocurso_id,
                'cuestionario_id'=> $this->cuestionario_id
            ]);
        } else{
            $this->msjabierta();
        }



        $this->msjexito4();
        $this->default();
    }

    public function editasignar($id){
        $pregunta=Pregunta::find($id);
        $this->titulo=$pregunta->cuestionario->titulo;
        $this->ncurso=$pregunta->cuestionario->maestrocurso->curso->cnombre;
        $this->ngrado=$pregunta->cuestionario->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$pregunta->cuestionario->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id=$pregunta->maestrocurso_id;
        $this->cuestionario_id=$pregunta->cuestionario_id;
        $this->pregunta_id=$pregunta->id;
        $this->pregunta=$pregunta->pregunta;
        $this->tipo=$pregunta->tipo;
        $this->ppunteo=$pregunta->ppunteo;
    }

    public function editasignar2($id){
        $respuesta=Respuesta::find($id);
        $this->pregunta2=$respuesta->pregunta->pregunta;
        $this->titulo2=$respuesta->pregunta->cuestionario->titulo;
        $this->cuestionario_id=$respuesta->pregunta->cuestionario_id;
        $this->ncurso=$respuesta->maestrocurso->curso->cnombre;
        $this->ngrado=$respuesta->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$respuesta->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id=$respuesta->maestrocurso_id;
        $this->pregunta_id=$respuesta->pregunta_id;
        $this->respuesta=$respuesta->respuesta;
        $this->respuesta_id=$respuesta->id;
        $this->restado=$respuesta->restado;
    }

    public function updateasignar(){
        $this->validate([
            'pregunta'=> 'required|string|max:450',
            'tipo'=> 'required|string|max:45',
            'ppunteo'=> 'required|numeric|min:0',
            'cuestionario_id'=> 'required|integer',
            'maestrocurso_id'=> 'required|integer'
        ]);

            $arc= Pregunta::find($this->pregunta_id);
            $arc->update([
                'pregunta'=> $this->pregunta,
                'tipo'=> $this->tipo,
                'ppunteo'=> $this->ppunteo,
            ]);

            if($this->tipo=='Abierta'){
                Respuesta::create([
                    'respuesta'=> "Pendiente para calificar",
                    'restado'=> "Verificar",
                    'pregunta_id'=> $this->pregunta_id,
                    'maestrocurso_id'=> $this->maestrocurso_id,
                ]);
            }

        $this->msjedit3();
        $this->default();

    }

    public function updateasignar2(){
        $this->validate([
            'respuesta'=> 'required|string|max:450',
            'restado'=> 'required|string|max:45',
            'pregunta_id'=> 'required|integer',
            'maestrocurso_id'=> 'required|integer'
        ]);

        $res= Respuesta::find($this->respuesta_id);
        $res->update([
            'respuesta'=> $this->respuesta,
            'restado'=> $this->restado,
        ]);


        $this->msjedit4();
        $this->default();

    }

    public function destroy($id){
        if(Respuesta::where('pregunta_id','=',$id)->count() > 0){
            $this->msjdelete3();
        } else{
            Pregunta::destroy($id);
            $this->msjdelete();
        }

    }
    public function destroy2($id){
        Respuesta::destroy($id);
        $this->msjdelete2();
    }

    public function default(){
        $this->fcreado = '';
        $this->ffinalizacion='';
        $this->cdescripcion='';
        $this->titulo='';
        $this->titulo2='';
        $this->cestado='';
        $this->punteo='';
        $this->buscar = '';
        $this->identificador='';
        $this->identificador2='';
        $this->cuestionario_id='';

        $this->pregunta='';
        $this->pregunta2='';
        $this->pregunta_id='';
        $this->tipo='';
        $this->ppunteo='';

        $this->respuesta='';
        $this->restado='';
        $this->respuesta_id='';

        $this->cantidadp='';
        $this->reintento='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Cuestionario registrado correctamente']);
    }

    public function msjexito3(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Pregunta registrada correctamente']);
    }
    public function msjexito4(){
        $this->dispatchBrowserEvent('alertasignar2',['message'=>'Respuesta registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Cuestionario editado correctamente']);
    }

    public function msjedit3(){
        $this->dispatchBrowserEvent('alerteditasignar',['message'=>'Pregunta editada correctamente']);
    }
    public function msjedit4(){
        $this->dispatchBrowserEvent('alerteditasignar2',['message'=>'Respuesta editada correctamente']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Pregunta eliminada correctamente']);
    }
    public function msjdelete3(){
        $this->dispatchBrowserEvent('alert4',['message'=>'No se puede eliminar Pregunta']);
    }
    public function msjabierta(){
        $this->dispatchBrowserEvent('alert4',['message'=>'No se puede registrar respuestas a una pregunta abierta']);
    }
    public function msjdelete2(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Respuesta eliminada correctamente']);
    }
}
