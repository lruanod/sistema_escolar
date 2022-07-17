<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;
use Session;
use PDF;

class VentaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $venta_id,$cliente,$descuentov, $total, $tipo;
    public $preciod,$cantidad,$descuentod, $subtotal,$producto_id,$identificador,$detalle_id;
    public $buscar, $errorstock;
    public $nombre, $precio, $descuento, $descripcion;

    public function  mount(){
        $this->identificador = rand();
        $detalle= Detalle::where('venta_id','=',session()->get('venta_id'))->get();
        $this->total=$detalle->sum('subtotal');
        $this->descuentov=$detalle->sum('descuentod');
    }
    public function totales(){
        $detalle= Detalle::where('venta_id','=',session()->get('venta_id'))->get();
        $this->total=$detalle->sum('subtotal');
        $this->descuentov=$detalle->sum('descuentod');
    }
    public function  change(){
        if(!empty($this->cantidad)){
            $producto= Producto::find($this->producto_id);
            $this->subtotal = ($this->cantidad*($producto->precio - $producto->descuento));
            $this->descuento= $this->cantidad*$producto->descuento;
        } else{
            $this->subtotal= '';
        }
    }

    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Producto::where('nombre','like',$busqueda)->orwhere('categoria_id','like',$busqueda)->paginate(8,['*'],'producto');
    }


    public function render()
    {
        return view('livewire.venta-component',[
            'categorias' => Categoria::all(),
            'productos' => $this->getProductosProperty(),
            'detalles' => Detalle::where('venta_id','=',session()->get('venta_id'))->paginate(8,['*'],'detalle')
        ]);
    }

    public function store(){
        $this->validate([
            'cliente'=> 'required|string|max:100',
            'tipo'=> 'required|string|max:45',
        ]);

        Venta::create([
            'cliente'=> $this->cliente,
            'descuentov'=> 0,
            'total'=> 0,
            'tipo'=> $this->tipo
        ]);


        $ventas= Venta::where('cliente','=',$this->cliente)->where('tipo','=',$this->tipo)->first()->get();
        foreach ( $ventas as $venta){
            session(['venta_id' => $venta->id]);
        }
        $this->msjexitopedido();
        $this->default();
    }

    public function agregar(){
        $this->validate([
            'precio'=> 'required|numeric|min:0',
            'cantidad'=> 'required|integer|min:0',
            'descuento'=> 'required|numeric|min:0',
            'subtotal'=> 'required|numeric|min:0'
        ]);
        $producto = Producto::find($this->producto_id);
        if($producto->stock >= $this->cantidad){
            // multiplicar descuento
            $this->descuento = $producto->descuento * $this->cantidad;
            //
            Detalle::create([
                'preciod'=> $this->precio,
                'cantidad'=> $this->cantidad,
                'descuentod'=> $this->descuento,
                'subtotal'=> $this->subtotal,
                'producto_id'=> $this->producto_id,
                'venta_id'=> session()->get('venta_id'),
            ]);
            $producto->update([
                'stock' => ($producto->stock - $this->cantidad)
            ]);
            $this->msjexitop();
        } else {
            $this->errorstock='No cuenta con disponibilidad';
            $this->msjerrorstock();
        }

        $this->totales();
        $this->resetPage();

    }

    public function editproducto($id){
        $detalle= Detalle::find($id);
        $this->detalle_id=$detalle->id;
        $this->nombre=$detalle->producto->nombre;
        $this->cantidad=$detalle->cantidad;
        $this->precio=$detalle->preciod;
        $this->descripcion=$detalle->producto->descripcion;
        $this->descuento=$detalle->descuentod;
        $this->subtotal=$detalle->subtotal;
        $this->producto_id=$detalle->producto_id;
    }
    public function updateproducto()
    {
        $this->validate([
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'descuento' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);
        $detalle = Detalle::find($this->detalle_id);
        if($this->cantidad <= ($detalle->producto->stock + $detalle->cantidad)){
            // regresando la disponibilidad en estock
            $producto = Producto::find($detalle->producto_id);
            $producto->update([
                'stock' => (($producto->stock +$detalle->cantidad)-$this->cantidad)
            ]);
            // multiplicar descuento
            $this->descuento = $producto->descuento * $this->cantidad;
            //
            // registrar detalle
            $detalle->update([
                'preciod' => $this->precio,
                'cantidad' => $this->cantidad,
                'descuentod' => $this->descuento,
                'subtotal' => $this->subtotal,
                'producto_id' => $this->producto_id,
                'venta_id' => session()->get('venta_id'),
            ]);

            $this->msjexitopu();
            $this->default();

        } else {
            $this->errorstock = 'No cuenta con disponibilidad';
            $this->msjerrorstock();
        }

            $this->totales();
            $this->resetPage();

    }
    public  function  eliminarproducto($id){
        // regresando la disponibilidad en estock
        $this->detalle_id=$id;
        $detalle= Detalle::find($this->detalle_id);
        $producto= Producto::find($detalle->producto_id);
        $producto->update([
                'stock' => $producto->stock + $detalle->cantidad,
            ]);

        ///////
        Detalle::destroy($detalle->id);
        $this->msjeliminar();
        $this->totales();
    }

    public function edit(){
        if(!empty(session()->get('venta_id'))){
            $id=session()->get('venta_id');
            $venta= Venta::find($id);
            $this->cliente = $venta->cliente;
            $this->tipo=$venta->tipo;
        } else{
            $this->msjalerta();
        }
    }

    public function detalle($id){
        $this->totales();
        $producto = Producto::find($id);
        $this->producto_id = $producto->id;
        if (!empty(session()->get('venta_id'))) {
            $this->nombre = $producto->nombre;
            $this->descripcion = $producto->descripcion;
            $this->precio = $producto->precio;
            $this->descuento = $producto->descuento;
            // $this->getdetelleingredientesProperty($this->producto_id);

        } else {
            $this->msjalerta();
        }
    }


    public function update(){
        $this->validate([
            'cliente'=> 'required|string|max:100',
            'tipo'=> 'required|string|max:45'
        ]);
        $venta= Venta::find(session()->get('venta_id'));
        $venta->update([
            'cliente'=> $this->cliente,
            'tipo'=> $this->tipo,
        ]);


        $this->msjedit();
        $this->default();
    }

    public function Generarpedido(){
        $this->validate([
            'descuentov'=> 'required|numeric|min:0',
            'total'=> 'required|numeric|min:1',
        ]);
        $venta= Venta::find(session()->get('venta_id'));
        $venta->update([
            'total'=> $this->total,
            'descuentov'=> $this->descuentov
        ]);

        $ventas= Venta::where('id','=',session()->get('venta_id'))->get();
        $detalles=Detalle::where('venta_id','=',session()->get('venta_id'))->get();
        session(['venta_id'=>'']);
        $this->default();
        $this->msjexitopdf();
        $this->resetPage();
        $this->redirect('/ventas');
        $pdf = PDF::loadView('livewire.ventas.boletaventa', compact('ventas','detalles'))->setPaper('letter','landscape')->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'Boleta.pdf');


    }
    public function Cancelar(){
        $detalles= Detalle::where('venta_id','=',session()->get('venta_id'))->get();
        foreach ($detalles as $det) {
            $this->eliminarproducto($det->id);
        }
        Venta::destroy(session()->get('venta_id'));
        session(['venta_id'=>'']);
        $this->default();
        $this->msjdeleted2();
        //$this->redirect('/pedidos');
        return redirect()->back();
    }
    public function default(){
        $this->cliente = '';
        //$this->producto_id='';
        $this->identificador = rand();

        $this->cantidad='';
        $this->precio='';
        $this->descuento='';
        $this->preciod='';
        $this->descuentod;
        $this->subtotal='';
        $this->errorstock='';
        $this->descripcion='';
      //  $this->total='';
      //  $this->descuentov='';

    }

    public function msjexitopedido(){
        $this->dispatchBrowserEvent('alertpedido',['message'=>'Registrado correctamente']);
    }

    public function msjexitop(){
        $this->dispatchBrowserEvent('alertp',['message'=>'Detalle registrado correctamente']);
    }
    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alertpdf',['message'=>'PDF generado']);
    }

    public function msjexitopu(){
        $this->dispatchBrowserEvent('alertpu',['message'=>'Detalle editado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Venta editada correctamente']);
    }

    public function msjalerta(){
        $this->dispatchBrowserEvent('alert4',['message'=>'Crear la venta primero']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Detalle eliminado, no existe disponiblidad de productos']);
    }

    public function msjeliminar(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Detalle eliminado']);
    }

    public function msjerrorstock(){
        $this->dispatchBrowserEvent('alert3',['message'=>$this->errorstock]);
    }

    public function msjdeleted2(){
        $this->dispatchBrowserEvent('alerteliminar',['message'=>'Venta eliminada']);
    }

}
