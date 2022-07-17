<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class ReporteComponent extends Component
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
        return view('livewire.reporte-component',[
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
            $detalles = Detalle::where('producto_id', '=', $this->producto_id)->whereBetween('created_at',array($this->finicio,$this->ffinal))->get();
        }
        if(!empty($this->categoria_id) && empty($this->producto_id) ){
            $detalles = Detalle::join('productos','detalles.producto_id','productos.id')->where('productos.categoria_id','=',$this->categoria_id)->whereBetween('detalles.created_at',array($this->finicio,$this->ffinal))->get();
        }
        if(!empty($this->categoria_id) && !empty($this->producto_id) ){
            $detalles = Detalle::join('productos','detalles.producto_id','productos.id')->where('productos.categoria_id', '=', $this->categoria_id)->where('detalles.producto_id','=',$this->producto_id)->whereBetween('detalles.created_at',array($this->finicio,$this->ffinal))->get();

        }
        if(empty($this->categoria_id) && empty($this->producto_id)){
            $detalles=  Detalle::whereBetween('created_at',array($this->finicio,$this->ffinal))->get();

        }
        if ($detalles->count()>=1){
            $ventas= Venta::whereBetween('created_at',array($this->finicio,$this->ffinal))->get();

            $this->default();
            $this->msjexitopdf();
            $this->resetPage();
            $this->redirect('/reportes');
            $inicio= $this->finicio;
            $final = $this->ffinal;
            $total=$detalles->sum('subtotal');
            $descuento=$detalles->sum('descuentod');
            $liquido=$total-$descuento;

            $pdf = PDF::loadView('livewire.reportes.reportepdf', compact('ventas','detalles','final','inicio','total','descuento','liquido'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                function () use ($pdf){
                    echo $pdf;
                }, 'Reporte_ventas'.now().'.pdf');

        } else  {
             $this->msjedit();
             $this->default();
        }


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
