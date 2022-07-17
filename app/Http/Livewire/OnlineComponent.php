<?php

namespace App\Http\Livewire;


use App\Models\Maestrocurso;
use App\Models\Online;
use Livewire\Component;
use Livewire\WithPagination;

class OnlineComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $online_id,$fecha,$ourl,$odescripcion,$estado, $maestrocurso_id, $inicio,$fin,$mc_id,$identificador;
    public $ngrado,$nnivel,$ncurso;
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
    public function getOnlinesProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Online::whereBetween('fecha',array($this->inicio,$this->fin))->where('maestrocurso_id','=',$this->mc_id)->paginate(8,['*'],'online');
        } else{
            return Online::orderBy("created_at", "desc")->where('maestrocurso_id','=',$this->mc_id)->paginate(8,['*'],'online');
        }

    }

    public function render()
    {
        return view('livewire.online-component',[
            'onlines' => $this->getOnlinesProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'fecha'=> 'required',
            'ourl'=> 'required|string|max:100',
            'odescripcion'=> 'required|string|max:500',
            'estado'=> 'required|string|max:45',
        ]);
        Online::create([
            'fecha'=> $this->fecha,
            'ourl'=> $this->ourl,
            'odescripcion'=> $this->odescripcion,
            'estado'=> $this->estado,
            'maestrocurso_id'=> $this->maestrocurso_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $online= Online::find($id);
        $this->ngrado=$online->maestrocurso->curso->grado->gnombre;
        $this->nnivel=$online->maestrocurso->curso->grado->nivel->nnombre;
        $this->maestrocurso_id = $online->maestrocurso->id;
        $this->online_id= $online->id;
        $this->fecha = $online->fecha;
        $this->ourl = $online->ourl;
        $this->odescripcion = $online->odescripcion;
        $this->estado = $online->estado;
        $this->ncurso=$online->maestrocurso->curso->cnombre;
        $this->identificador=$online->fecha;
    }

    public function update(){
        $this->validate([
            'fecha'=> 'required',
            'ourl'=> 'required|string|max:100',
            'odescripcion'=> 'required|string|max:500',
            'estado'=> 'required|string|max:45'
        ]);

        $online= Online::find($this->online_id);
        $online->update([
            'fecha'=> $this->fecha,
            'ourl'=> $this->ourl,
            'odescripcion'=> $this->odescripcion,
            'estado'=> $this->estado,
            'maestrocurso_id'=> $this->maestrocurso_id
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->fecha = '';
        $this->ourl='';
        $this->odescripcion='';
        $this->estado='';
        $this->maestrocurso_id='';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Clase online registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Clase online editada correctamente']);
    }
}
