<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Entrada;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class RepotestockComponent extends Component
{

    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public  $finicio,$ffinal, $categoria_id, $producto_id,$nombre;
    public $buscar;


    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Producto::where('nombre','like',$busqueda)->orwhere('categoria_id','like',$busqueda)->paginate(8,['*'],'producto');
    }

    public function render()
    {
        $busqueda= $this->buscar;
        return view('livewire.repotestock-component',[
            'categorias'=>Categoria::all(),
            'productos'=> $this->getProductosProperty()

        ]);
    }

    public function busquedap($id){
        $producto = Producto::find($id);
        $this->producto_id =$producto->id;
        $this->nombre=$producto->nombre;
        $this->msjexitop();
    }


    public function Generarpdf(){
        $this->validate([
            'finicio'=> 'required',
            'ffinal'=> 'required'
        ]);

        if(!empty($this->producto_id) && empty($this->categoria_id)){
            $entradas = Entrada::where('producto_id', '=', $this->producto_id)->whereBetween('created_at',array($this->finicio,$this->ffinal))->get();
        }
        if(!empty($this->categoria_id) && empty($this->producto_id) ){
            $entradas = Entrada::join('productos','entradas.producto_id','productos.id')->where('productos.categoria_id','=',$this->categoria_id)->whereBetween('entradas.created_at',array($this->finicio,$this->ffinal))->get();
        }
        if(!empty($this->categoria_id) && !empty($this->producto_id) ){
            $entradas = Entrada::join('productos','entradas.producto_id','productos.id')->where('productos.categoria_id', '=', $this->categoria_id)->where('entradas.producto_id','=',$this->producto_id)->whereBetween('entradas.created_at',array($this->finicio,$this->ffinal))->get();
        }
        if(empty($this->categoria_id) && empty($this->producto_id)){
            $entradas=  Entrada::whereBetween('created_at',array($this->finicio,$this->ffinal))->get();
        }

            $this->default();
            $this->msjexitopdf();
            $this->resetPage();
            $this->redirect('/reportestocks');
            $inicio= $this->finicio;
            $final = $this->ffinal;
            $pdf = PDF::loadView('livewire.reportestocks.reportepdf', compact('final','inicio','entradas'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                function () use ($pdf){
                    echo $pdf;
                }, 'Reporte_Entradas_'.now().'.pdf');

    }


    public function default(){
        $this->ffinal='';
        $this->finicio='';
        $this->nombre='';
        $this->producto_id='';
        $this->categoria_id='';
    }



    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alertpdf',['message'=>'PDF generado']);
    }


    public function msjexitop(){
        $this->dispatchBrowserEvent('alertpp',['message'=>'Producto seleccionado']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'No hay registros']);
    }

}
