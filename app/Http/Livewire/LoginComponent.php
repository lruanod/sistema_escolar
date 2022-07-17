<?php

namespace App\Http\Livewire;
use App\Models\Administrador;
use App\Models\Cuestionario;
use App\Models\Cuota;
use App\Models\Estudiante;
use App\Models\Maestro;
use App\Models\Padre;
use App\Models\Usuario;
use Livewire\Component;

class LoginComponent extends Component
{
    public $usuario,$pass, $rol, $mesa,$mes;


    public function render()
    {
        return view('livewire.login-component');
    }

    public function login(){
        $this->validate([
            'usuario'=> 'required|string|max:75',
            'pass'=> 'required|string|min:7',
            'rol'=> 'required|string|max:45'
        ]);
        if($this->rol=='Administrador'){
            if(Administrador::where('ausuario','=',$this->usuario)->where('apass','=',$this->pass)->count() > 0){
                $administrador= Administrador::where('ausuario','=',$this->usuario)->where('apass','=',$this->pass)->get();
                foreach ( $administrador as $admin){
                    session(['ausuario'=>$admin->ausuario]);
                    session(['anombre'=>$admin->anombre]);
                    session(['administrador_id'=>$admin->id]);
                    session(['rol'=>$admin->rol]);
                    session(['url'=>"../img/undraw_profile.svg"]);
                }
                $this->msjexito();
                return redirect('/estudiantes');
            } else{
                $this->msjdelete();
            }
        }
        if($this->rol=='Profesor'){
            if(Maestro::where('musuario','=',$this->usuario)->where('mpass','=',$this->pass)->count() > 0){
                $maestro= Maestro::where('musuario','=',$this->usuario)->where('mpass','=',$this->pass)->get();
                foreach ( $maestro as $prof){
                    session(['musuario'=>$prof->musuario]);
                    session(['mnombre'=>$prof->mnombre]);
                    session(['maestro_id'=>$prof->id]);
                    session(['rol'=>'Maestro']);
                    session(['url'=>$prof->murl]);
                }
                $this->msjexito();
                return redirect('/actividades');
            } else{
                $this->msjdelete();
            }
        }
        if($this->rol=='Estudiante'){
            if(Estudiante::where('eusuario','=',$this->usuario)->where('epass','=',$this->pass)->count() > 0){
                $estudiante= Estudiante::where('eusuario','=',$this->usuario)->where('epass','=',$this->pass)->get();
                foreach ( $estudiante as $est){
                    session(['eusuario'=>$est->eusuario]);
                    session(['enombre'=>$est->enombre]);
                    session(['estudiante_id'=>$est->id]);
                    session(['rol'=>'Estudiante']);
                    session(['url'=>$est->eurl]);
                    $cuota= Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('asignaciongrados.estudiante_id','=',$est->id)->orderBy('cuotas.id', 'desc')->take(1)->get();
                    foreach ( $cuota as $cu) {
                        $this->mes=$cu->mes;
                        $this->mesa=date('m');
                        if($this->mes >= $this->mesa){
                            session(['solvente' => $this->mes]);
                        }
                    }
                }
                $this->msjexito();
                return redirect('/eactividades');
            } else{
                $this->msjdelete();
            }
        }
        if($this->rol=='Padre'){
            if(Padre::where('pusuario','=',$this->usuario)->where('ppass','=',$this->pass)->count() > 0){
                $padre= Padre::where('pusuario','=',$this->usuario)->where('ppass','=',$this->pass)->get();
                foreach ( $padre as $dad){
                    session(['pusuario'=>$dad->pusuario]);
                    session(['pnombre'=>$dad->pnombre]);
                    session(['padre_id'=>$dad->id]);
                    session(['rol'=>'Padre']);
                    session(['url'=>$dad->purl]);
                }
                $this->msjexito();
                return redirect('/pactividades');
            } else{
                $this->msjdelete();
            }
        }


        $this->default();
    }

    // logout
    public function  logout(){
        session()->invalidate();
        $this->msjcerrar();
        $this->default();
        return redirect('/');
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Bienvenido']);
    }

    public function msjcerrar(){
        $this->dispatchBrowserEvent('alert2',['message'=>'cerro sesión correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'credenciales no validad, verifique usuario y contraseña']);
    }

    public function default(){
        $this->usuario = '';
        $this->pass = '';
        $this->rol='';
    }
}
