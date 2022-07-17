<?php

namespace App\Http\Livewire;


use App\Models\Entregatarea;
use App\Models\Estudiantearchivo;
use App\Models\Maestroarchivo;
use App\Models\Maestrocurso;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class TareaComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $tarea_id,$fcreado,$ffinalizacion,$tdescripcion,$titulo,$punteo, $maestrocurso_id,$inicio,$fin,$mc_id,$identificador,$identificador2, $testado;
    public $ngrado,$nnivel,$ncurso;
    public $maestroarchivo_id,$murl, $murl2,$murl3, $identificador3,$identificador4,$mtitulo;
    public $buscar;

    public function mount($mc_id = null){
        $this->mc_id = $mc_id;
        $this->maestrocurso_id=$mc_id;
        $maestrocuros = maestrocurso::where('id','=',$mc_id)->get();
        foreach ( $maestrocuros as $mcu){
            $this->ngrado = $mcu->curso->grado->gnombre;
            $this->nnivel = $mcu->curso->grado->nivel->nnombre;
            $this->ncurso =$mcu->curso->cnombre;
        }
        $this->identificador3 = rand();
        $this->identificador4 = rand();
    }
    public function getTareasProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Tarea::whereBetween('ffinalizacion',array($this->inicio,$this->fin))->where('maestrocurso_id','=',$this->mc_id)->paginate(8,['*'],'tarea');
        } else{
            return Tarea::orderBy("created_at", "desc")->where('maestrocurso_id','=',$this->mc_id)->paginate(8,['*'],'tarea');
        }

    }

    public function render()
    {
        return view('livewire.tarea-component',[
            'tareas' => $this->getTareasProperty(),
            'maestroarchivos'=> Maestroarchivo::where('maestrocurso_id','=',$this->mc_id)->get(),
            'entregatareas'=> Entregatarea::where('tarea_id','=',$this->tarea_id)->get(),
            'estudiantearchivos'=> Estudiantearchivo::join('entregatareas','estudiantearchivos.entregatarea_id','entregatareas.id')->where('entregatareas.tarea_id','=',$this->tarea_id)->get()
        ]);
    }
    public function store(){
        $this->validate([
            'fcreado'=> 'required',
            'ffinalizacion'=> 'required',
            'tdescripcion'=> 'required|string|max:500',
            'titulo'=> 'required|string|max:75',
            'testado'=> 'required|string|max:35',
            'punteo'=> 'required|numeric|min:0'
        ]);
        Tarea::create([
            'fcreado'=> $this->fcreado,
            'ffinalizacion'=> $this->ffinalizacion,
            'tdescripcion'=> $this->tdescripcion,
            'titulo'=> $this->titulo,
            'testado'=>$this->testado,
            'punteo'=> $this->punteo,
            'maestrocurso_id'=> $this->maestrocurso_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $tarea= Tarea::find($id);
        $this->ngrado=$tarea->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$tarea->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id = $tarea->maestrocurso->id;
        $this->tarea_id= $tarea->id;
        $this->fcreado = $tarea->fcreado;
        $this->ffinalizacion = $tarea->ffinalizacion;
        $this->tdescripcion = $tarea->tdescripcion;
        $this->titulo = $tarea->titulo;
        $this->punteo = $tarea->punteo;
        $this->testado=$tarea->testado;
        $this->ncurso=$tarea->maestrocurso->curso->cnombre;
        $this->identificador=$tarea->fcreado;
        $this->identificador2=$tarea->ffinalizacion;
    }

    public function update(){
        $this->validate([
            'fcreado'=> 'required',
            'ffinalizacion'=> 'required',
            'tdescripcion'=> 'required|string|max:500',
            'titulo'=> 'required|string|max:75',
            'testado'=> 'required|string|max:35',
            'punteo'=> 'required|numeric|min:0'
        ]);

        $tarea= Tarea::find($this->tarea_id);
        $tarea->update([
            'fcreado'=> $this->fcreado,
            'ffinalizacion'=> $this->ffinalizacion,
            'tdescripcion'=> $this->tdescripcion,
            'titulo'=> $this->titulo,
            'testado'=>$this->testado,
            'punteo'=> $this->punteo,
            'maestrocurso_id'=> $this->maestrocurso_id
        ]);
        $this->msjedit();
        $this->default();

    }

    public function addasignar($id){
        $tarea=Tarea::find($id);
        $this->titulo=$tarea->titulo;
        $this->ncurso=$tarea->maestrocurso->curso->cnombre;
        $this->ngrado=$tarea->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$tarea->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id=$tarea->maestrocurso_id;
        $this->tarea_id=$tarea->id;
    }
     public function ver($id){
       $tarea=Tarea::find($id);
      $this->tarea_id=$tarea->id;
     }

    public function regasignar(){
        $this->validate([
            'murl.*'=> 'required|max:5048',
            'tarea_id'=> 'required|integer',
            'maestrocurso_id'=> 'required|integer'
        ]);
        foreach ($this->murl as $key => $archivo){
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            // $image= $this->iurl->store('portadas','public');
            $nombre=$this->murl[$key]->getClientOriginalName();
            $archivo= $this->murl[$key]->store('archivos','public');
            /*fin*/
            Maestroarchivo::create([
                'murl'=> $archivo,
                'mtitulo'=> $nombre,
                'tarea_id'=> $this->tarea_id,
                'maestrocurso_id'=> $this->maestrocurso_id,
            ]);
        }

        $this->msjexito3();
        $this->default();
    }

    public function editasignar($id){
        $maestroarchivo=Maestroarchivo::find($id);
        $this->titulo=$maestroarchivo->tarea->titulo;
        $this->ncurso=$maestroarchivo->tarea->maestrocurso->curso->cnombre;
        $this->ngrado=$maestroarchivo->tarea->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$maestroarchivo->tarea->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id=$maestroarchivo->maestrocurso_id;
        $this->murl3=$maestroarchivo->murl;
        $this->tarea_id=$maestroarchivo->tarea_id;
        $this->maestroarchivo_id=$maestroarchivo->id;
    }

    public function updateasignar(){
        $this->validate([
            'tarea_id'=> 'required|integer',
            'maestrocurso_id'=> 'required|integer'
        ]);

        $arc= Maestroarchivo::find($this->maestroarchivo_id);
        if(!empty($this->murl2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($arc->murl);
            //eliminar
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $archivo= $this->murl2->store('archivos','public');
            $nombre=$this->murl2->getClientOriginalName();
            /*fin*/
            $arc->update([
                'murl'=> $archivo,
                'mtitulo'=> $nombre,
                'tarea_id'=> $this->tarea_id,
                'maestrocurso_id'=> $this->maestrocurso_id
            ]);
        } else{
            $arc->update([
                'tarea_id'=> $this->tarea_id,
                'maestrocurso_id'=> $this->maestrocurso_id
            ]);
        }
        $this->msjedit3();
        $this->default();

    }

    public function destroy($id){
        $archivo= Maestroarchivo::find($id);
        // eliminar archivo existente
        Storage::disk('public')->delete($archivo->murl);
        //eliminar
        Maestroarchivo::destroy($id);
        $this->msjdelete();
    }

    public function default(){
        $this->fcreado = '';
        $this->ffinalizacion='';
        $this->tdescripcion='';
        $this->titulo='';
        $this->punteo='';
        $this->buscar = '';
        $this->identificador='';
        $this->identificador2='';
        $this->tarea_id='';
        $this->testado='';

        $this->murl='';
        $this->murl2='';
        $this->murl3='';
        $this->identificador3='';
        $this->identificador4='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Actividad registrada correctamente']);
    }

    public function msjexito3(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Archivo registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Actividad editada correctamente']);
    }

    public function msjedit3(){
        $this->dispatchBrowserEvent('alerteditasignar',['message'=>'Archivo editado correctamente']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Archivo eliminado correctamente']);
    }
}
