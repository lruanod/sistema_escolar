<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Venta;
use Livewire\Component;
use PDF;
use Livewire\WithPagination;

class EventaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $venta_id,$cliente,$descuentov,$total,$tipo, $finicio,$ffinal, $fecha;
    public $detalle_id,$preciod,$cantidad,$descuentod,$subtotal,$producto_id,$nombre,$descripcion;
    public $buscar;

    public function  mount(){
        $detalle= Detalle::where('venta_id','=',$this->venta_id)->get();
        $this->total=$detalle->sum('subtotal');
        $this->descuentov=$detalle->sum('descuentod');
    }
    public function totales(){
        $detalle= Detalle::where('venta_id','=',$this->venta_id)->get();
        $this->total=$detalle->sum('subtotal');
        $this->descuentov=$detalle->sum('descuentod');
    }
    public function  change(){
        if(!empty($this->cantidad)){
            $producto= Producto::find($this->producto_id);
            $this->subtotal = ($this->cantidad*($producto->precio - $producto->descuento));
            $this->descuentod= $this->cantidad * $producto->descuento;
        } else{
            $this->subtotal= '';
        }
    }

    public function getVentasProperty(){
        if(!empty($this->finicio)&&!empty($this->ffinal)){
            return Venta::whereBetween('created_at',array($this->finicio,$this->ffinal))->paginate(8,['*'],'venta');
        } else{
            return Venta::orderBy("created_at", "desc")->paginate(8,['*'],'venta');
        }

    }

    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Producto::where('nombre','like',$busqueda)->orwhere('categoria_id','like',$busqueda)->paginate(8,['*'],'producto');
    }

    public function render()
    {
        $busqueda= $this->buscar;
        return view('livewire.eventa-component',[
            'ventas' => $this->getVentasProperty(),
            'categorias'=>Categoria::all(),
            'detalles'=> Detalle::where('venta_id','=',$this->venta_id)->paginate(8,['*'],'detalle'),
            'productos'=> $this->getProductosProperty()

        ]);
    }

    public function edit($id){
        $venta= venta::find($id);
        $this->venta_id=$id;
        $this->cliente=$venta->cliente;
        $this->descuentov=$venta->descuentov;
        $this->total = $venta->total;
        $this->tipo= $venta->tipo;
        $this->fecha= $venta->created_at;
    }
    public function formdetalle($id){
        $detalle = Detalle::find($id);
        $this->producto_id =$detalle->producto_id;
        $this->nombre=$detalle->producto->nombre;
        $this->descripcion=$detalle->producto->descripcion;
        $this->descuentod=$detalle->descuentod;
        $this->cantidad=$detalle->cantidad;
        $this->preciod=$detalle->preciod;
        $this->detalle_id=$id;
        $this->subtotal=$detalle->subtotal;
    }

    public function update()
    {
        $this->validate([
            'preciod' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'descuentod' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
            'cliente'=> 'required|string|max:100',
         //   'descuentov'=> 'required|numeric|min:0',
            'total'=> 'required|numeric|min:0',
            'tipo'=> 'required|string|max:45'
        ]);
        $detalle = Detalle::find($this->detalle_id);
        if($this->cantidad <= ($detalle->producto->stock + $detalle->cantidad)){
            // regresando la disponibilidad en estock
            $producto = Producto::find($detalle->producto_id);
            $producto->update([
                'stock' => (($producto->stock +$detalle->cantidad)-$this->cantidad)
            ]);
            // multiplicar descuento
            $this->descuentod = $producto->descuento * $this->cantidad;
            //
            // registrar detalle
            $detalle->update([
                'preciod' => $this->preciod,
                'cantidad' => $this->cantidad,
                'descuentod' => $this->descuentod,
                'subtotal' => $this->subtotal,
                'producto_id' => $this->producto_id,
                'venta_id' => $this->venta_id,
            ]);

            // actualizar totales
            $this->totales();
            /// actualizar venta
            $venta= Venta::find($this->venta_id);
            $venta->update([
                'cliente'=> $this->cliente,
                'descuentov'=> $this->descuentov,
                'total'=> $this->total,
                'tipo'=> $this->tipo,
            ]);
            $this->msjexitopu();
            $this->default();

        } else {
            $this->errorstock = 'No cuenta con disponibilidad';
            $this->msjerrorstock();
        }

        $this->resetPage();

    }

    public function detalle($id){
        $this->totales();
        $producto = Producto::find($id);
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->preciod = $producto->precio;
        $this->descuentod = $producto->descuento;
    }


    public function agregar(){
        $this->validate([
            'preciod'=> 'required|numeric|min:0',
            'cantidad'=> 'required|integer|min:0',
            'descuentod'=> 'required|numeric|min:0',
            'subtotal'=> 'required|numeric|min:0'
        ]);
        $producto = Producto::find($this->producto_id);
        if($producto->stock >= $this->cantidad){
            // multiplicar descuento
            $this->descuentod = $producto->descuento * $this->cantidad;
            //
            Detalle::create([
                'preciod'=> $this->preciod,
                'cantidad'=> $this->cantidad,
                'descuentod'=> $this->descuentod,
                'subtotal'=> $this->subtotal,
                'producto_id'=> $this->producto_id,
                'venta_id'=> $this->venta_id
            ]);
            $producto->update([
                'stock' => ($producto->stock - $this->cantidad)
            ]);
            $this->totales();
            $venta = Venta::find($this->venta_id);
            $venta->update([
                'cliente' => $this->cliente,
                'descuentov'=> $this->descuentov,
                'total'=> $this->total,
                'tipo'=> $this->tipo
            ]);


            $this->msjexitop();
        } else {
            $this->errorstock='No cuenta con disponibilidad';
            $this->msjerrorstock();
        }


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


    public function Generarpedido(){
        $this->validate([
            'descuentov'=> 'required|numeric|min:0',
            'total'=> 'required|numeric|min:1',
        ]);
        $venta= Venta::find($this->venta_id);
        $venta->update([
            'total'=> $this->total,
            'descuentov'=> $this->descuentov
        ]);

        $ventas= Venta::where('id','=',$this->venta_id)->get();
        $detalles=Detalle::where('venta_id','=',$this->venta_id)->get();
        $this->venta_id='';
        $this->default();
        $this->msjexitopdf();
        $this->resetPage();
        $this->redirect('/eventas');
        $pdf = PDF::loadView('livewire.eventas.boletaventa', compact('ventas','detalles'))->setPaper('letter','landscape')->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'Boleta '.now().'.pdf');


    }

    public function Cancelar(){
        $detalles= Detalle::where('venta_id','=',$this->venta_id)->get();
        foreach ($detalles as $det) {
            $this->eliminarproducto($det->id);
        }
        Venta::destroy($this->venta_id);
        $this->venta_id='';
        $this->default();
        $this->msjdeleted2();
        return redirect()->back();
    }

    public function default(){
      //   $this->cliente='';
      //   $this->descuentov='';
      //   $this->total='';
        //  $this->tipo='';
         $this->fecha='';
         $this->preciod='';
         $this->cantidad='';
         $this->descuentod='';
         $this->subtotal='';
         $this->producto_id='';
         $this->nombre='';
         $this->descripcion='';
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
