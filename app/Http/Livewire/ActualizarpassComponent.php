<?php

namespace App\Http\Livewire;

use App\Models\Administrador;
use App\Models\Estudiante;
use App\Models\Maestro;
use App\Models\Padre;
use Livewire\Component;

class ActualizarpassComponent extends Component
{
    public $pass,$pass2,$pass3, $usuario_id;
    public function render()
    {
        return view('livewire.actualizarpass-component');
    }

    public function actualizar(){
        $this->validate([
            'pass'=> 'required|string|min:7',
            'pass2'=> 'required|string|min:7',
            'pass3'=> 'required|string|min:7'
        ]);

        if(session()->get('rol')=='Estudiante'){
            $usuario_id=session()->get('estudiante_id');
            if(Estudiante::where('id','=',$usuario_id)->where('epass','=',$this->pass)->count() > 0){
                if($this->pass2==$this->pass3){
                    $usuario= Estudiante::find($usuario_id);
                    $usuario->update([
                        'epass'=> $this->pass2
                    ]);
                    $this->msjexito();
                    $this->default();
                    return redirect('/eactividades');

                }else{
                    $this->msjnoiguales();
                }
            } else{
                $this->msjnocoincide();
            }
        }
        if(session()->get('rol')=='Maestro'){
            $usuario_id=session()->get('maestro_id');
            if(Maestro::where('id','=',$usuario_id)->where('mpass','=',$this->pass)->count() > 0){
                if($this->pass2==$this->pass3){
                    $usuario= Maestro::find($usuario_id);
                    $usuario->update([
                        'mpass'=> $this->pass2
                    ]);
                    $this->msjexito();
                    $this->default();
                    return redirect('/actividades');

                }else{
                    $this->msjnoiguales();
                }
            } else{
                $this->msjnocoincide();
            }
        }
        if(session()->get('rol')=='Administrador'){
            $usuario_id=session()->get('administrador_id');
            if(Administrador::where('id','=',$usuario_id)->where('apass','=',$this->pass)->count() > 0){
                if($this->pass2==$this->pass3){
                    $usuario= Administrador::find($usuario_id);
                    $usuario->update([
                        'apass'=> $this->pass2
                    ]);

                    $this->msjexito();
                    $this->default();
                    return redirect('/estudiantes');
                }else{
                    $this->msjnoiguales();
                }
            } else{
                $this->msjnocoincide();
            }
        }
        if(session()->get('rol')=='Padre'){
            $usuario_id=session()->get('padre_id');
            if(Padre::where('id','=',$usuario_id)->where('ppass','=',$this->pass)->count() > 0){
                if($this->pass2==$this->pass3){
                    $usuario= Padre::find($usuario_id);
                    $usuario->update([
                        'ppass'=> $this->pass2
                    ]);

                    $this->msjexito();
                    $this->default();
                    return redirect('/pactividades');

                }else{
                    $this->msjnoiguales();
                }
            } else{
                $this->msjnocoincide();
            }
        }
    }

    public function default(){
        $this->pass = '';
        $this->pass2 = '';
        $this->pass3 = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Contraseña actualizada correctamente']);
    }

    public function msjnoiguales(){
        $this->dispatchBrowserEvent('alert4',['message'=>'La contraseña nueva y de confirmación son diferentes']);

    }

    public function msjnocoincide(){
        $this->dispatchBrowserEvent('alert3',['message'=>'La contraseña no coincide con la anterior']);
    }
}
