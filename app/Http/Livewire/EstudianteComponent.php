<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Ciclo;
use App\Models\Cuestionarioestudiante;
use App\Models\Curso;
use App\Models\Detalleingrediente;
use App\Models\Estudiante;
use App\Models\Estudiantecurso;
use App\Models\Grado;
use App\Models\Padre;
use App\Models\Padresestudiante;
use App\Models\Usuario;
use App\Models\Zona;
use App\Models\Zonaevaluacion;
use Livewire\Component;
use Livewire\WithPagination;

class EstudianteComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $estudiante_id,$enombre,$edireccion,$ecui,$ecorreo,$epass,$eusuario,$eestado;
    public $asignaciongrado_id,$fecha,$grado_id,$enombre3,$ciclo_id,$estado;
    public $padre_id,$pnombre,$enombre2,$pdireccion,$pcel,$pcui,$ppariente,$pcorreo,$ppass,$pusuario;
    public $buscar, $buscar2;

    public function getEstudiantesProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Estudiante::where('enombre','like',$busqueda)->paginate(8,['*'],'estudiante');
    }
    public function getPadresProperty(){
        $busqueda2='%'.$this->buscar2.'%';
        return Padre::where('pnombre','like',$busqueda2)->paginate(8,['*'],'padre');
    }
    public function render()
    {
        return view('livewire.estudiante-component',[
            'estudiantes' => $this->getEstudiantesProperty(),
            'asignars'=> Asignaciongrado::all(),
            'padreestudiantes'=> Padresestudiante::all(),
            'padres2'=> $this->getPadresProperty(),
            'grado2s'=> Grado::all(),
            'ciclos'=> Ciclo::all()
        ]);
    }
    public function store(){
        $this->validate([
            'enombre'=> 'required|string|max:75',
            'edireccion'=> 'required|string|max:75',
            'ecui'=> 'required|integer|min:10',
            'ecorreo'=> 'required|email|max:45|unique:estudiantes',
            'epass'=> 'required|string|min:7',
            'eusuario'=> 'required|string|max:45|unique:estudiantes',
            'eestado'=> 'required|string|max:45'
        ]);
        Estudiante::create([
            'enombre'=> $this->enombre,
            'edireccion'=>$this->edireccion,
            'ecui'=> $this->ecui,
            'ecorreo'=> $this->ecorreo,
            'epass'=> $this->epass,
            'eusuario'=> $this->eusuario,
            'eestado'=> $this->eestado,
            'eurl'=> "",
        ]);
        $this->msjexito();
        $this->default();
    }
    public function addpadre($id){
        $estudiante=Estudiante::find($id);
        $this->enombre2=$estudiante->enombre;
        $this->estudiante_id=$estudiante->id;
    }
    public function addasignar($id){
        $estudiante=Estudiante::find($id);
        $this->enombre3=$estudiante->enombre;
        $this->estudiante_id=$estudiante->id;
    }
    public function regpadre(){
        $this->validate([
            'pnombre'=> 'required|string|max:75',
            'pdireccion'=> 'required|string|max:75',
            'pcel'=> 'required|string|min:8',
            'pcui'=> 'required|integer|min:10',
            'ppariente'=> 'required|string|max:20',
            'pcorreo'=> 'required|email|max:45|unique:padres',
            'ppass'=> 'required|string|min:7',
            'pusuario'=> 'required|string|max:45|unique:padres',
        ]);
        Padre::create([
            'pnombre'=> $this->pnombre,
            'pdireccion'=>$this->pdireccion,
            'pcel'=>$this->pcel,
            'pcui'=> $this->pcui,
            'ppariente'=> $this->ppariente,
            'pcorreo'=> $this->pcorreo,
            'ppass'=> $this->ppass,
            'pusuario'=> $this->pusuario,
            'purl'=> "",
        ]);

        $padreestu= Padre::orderBy("created_at", "desc")->take(1)->get();
        foreach ($padreestu as $pa){
            $this->padre_id=$pa->id;
        }
        Padresestudiante::create([
            'estudiante_id'=> $this->estudiante_id,
            'padre_id'=>$this->padre_id
        ]);


        $this->msjexito2();
        $this->default();
    }

    public function regasignar(){
        $this->validate([
            'fecha'=> 'required|date',
            'ciclo_id'=> 'required|integer',
            'grado_id'=> 'required|integer',
            'estado'=> 'required|string|max:20',
        ]);
        Asignaciongrado::create([
            'fecha'=> $this->fecha,
            'ciclo_id'=>$this->ciclo_id,
            'grado_id'=>$this->grado_id,
            'estudiante_id'=> $this->estudiante_id,
            'estado'=> $this->estado
        ]);

        $asigs=  Asignaciongrado::where('estudiante_id', '=', $this->estudiante_id)->where('grado_id', '=', $this->grado_id)->where('fecha', '=', $this->fecha)->latest()->take(1)->get();
        foreach ($asigs as $as){
            $this->asignaciongrado_id=$as->id;
        }
        $cursos = Curso::where('grado_id', '=', $this->grado_id)->get();
        foreach ($cursos as $curso){
            Estudiantecurso::create([
                'curso_id'=> $curso->id,
                'asignaciongrado_id'=>$this->asignaciongrado_id,
            ]);
            $estudiantecursos=Estudiantecurso::where('asignaciongrado_id','=',$this->asignaciongrado_id)->where('curso_id','=',$curso->id)->take(1)->get();
            foreach ($estudiantecursos as $ecurso){
                Zona::create([
                    'zestado'=> 'No aprobado',
                    'zona'=>0,
                    'total'=>0,
                    'aspecto'=>0,
                    'estudiantecurso_id'=>$ecurso->id,
                    'evaluacion'=>0
                ]);
                $zonas = Zona::where('estudiantecurso_id', '=',$ecurso->id )->take(1)->get();
                foreach ($zonas as $zona){
                    Zonaevaluacion::create([
                        'bimestre'=>'I',
                        'zepunteo'=>0,
                        'zona_id'=>$zona->id
                    ]);
                    Zonaevaluacion::create([
                        'bimestre'=>'II',
                        'zepunteo'=>0,
                        'zona_id'=>$zona->id
                    ]);
                    Zonaevaluacion::create([
                        'bimestre'=>'II',
                        'zepunteo'=>0,
                        'zona_id'=>$zona->id
                    ]);
                    Zonaevaluacion::create([
                        'bimestre'=>'IV',
                        'zepunteo'=>0,
                        'zona_id'=>$zona->id
                    ]);
                }
            }
        }




        $this->msjexito3();
        $this->default();
    }
    public function modalasignar($id){
          $this->estudiante_id=$id;
    }

    public function asignarpadre($id){
        $this->padre_id=$id;
        Padresestudiante::create([
            'estudiante_id'=> $this->estudiante_id,
            'padre_id'=>$this->padre_id
        ]);
        $this->msjaso();
        $this->default();
    }

    public function edit($id){
        $estudiante= Estudiante::find($id);
        $this->estudiante_id = $estudiante->id;
        $this->enombre = $estudiante->enombre;
        $this->edireccion = $estudiante->edireccion;
        $this->ecui = $estudiante->ecui;
        $this->ecorreo = $estudiante->ecorreo;
        $this->epass = $estudiante->epass;
        $this->eusuario = $estudiante->eusuario;
        $this->eestado = $estudiante->eestado;
    }
    public function editpadre($id,$id_es){
        $padre= Padre::find($id);
        $estudiante=Estudiante::find($id_es);
        $this->padre_id = $padre->id;
        $this->pnombre = $padre->pnombre;
        $this->pdireccion = $padre->pdireccion;
        $this->pcel = $padre->pcel;
        $this->pcui = $padre->pcui;
        $this->ppariente = $padre->ppariente;
        $this->pcorreo = $padre->pcorreo;
        $this->ppass = $padre->ppass;
        $this->pusuario = $padre->pusuario;
        $this->estudiante_id=$estudiante->id;
        $this->enombre2 = $estudiante->enombre;
    }
    public function editasignar($id,$id_es){
        $asignar= Asignaciongrado::find($id);
        $estudiante=Estudiante::find($id_es);
        $this->asignaciongrado_id = $asignar->id;
        $this->fecha = $asignar->fecha;
        $this->grado_id = $asignar->grado_id;
        $this->estudiante_id = $asignar->estudiante_id;
        $this->ciclo_id = $asignar->ciclo_id;
        $this->estado = $asignar->estado;
        $this->enombre3 = $estudiante->enombre;
    }

    public function update(){
        $this->validate([
            'enombre'=> 'required|string|max:75',
            'edireccion'=> 'required|string|max:75',
            'ecui'=> 'required|integer|min:10',
            'epass'=> 'required|string|min:7',
            'eestado'=> 'required|string|max:45'
        ]);

        $estudiante= Estudiante::find($this->estudiante_id);
        $estudiante->update([
            'enombre'=> $this->enombre,
            'edireccion'=>$this->edireccion,
            'ecui'=> $this->ecui,
            'epass'=> $this->epass,
            'eestado'=> $this->eestado
        ]);
        $this->msjedit();
        $this->default();

    }

    public function updatepadre(){
        $this->validate([
            'pnombre'=> 'required|string|max:75',
            'pdireccion'=> 'required|string|max:75',
            'pcel'=> 'required|string|min:8',
            'pcui'=> 'required|integer|min:10',
            'ppariente'=> 'required|string|max:20',
            'ppass'=> 'required|string|min:7',
        ]);

        $padre= Padre::find($this->padre_id);
        $padre->update([
            'pnombre'=> $this->pnombre,
            'pdireccion'=>$this->pdireccion,
            'pcel'=>$this->pcel,
            'pcui'=> $this->pcui,
            'ppariente'=> $this->ppariente,
            'ppass'=> $this->ppass
        ]);
        $this->msjedit2();
        $this->default();

    }

    public function updateasignar(){
        $this->validate([
            'fecha'=> 'required|date',
            'ciclo_id'=> 'required|integer',
            'grado_id'=> 'required|integer',
            'estado'=> 'required|string|max:20',
        ]);

        $asignar= Asignaciongrado::find($this->asignaciongrado_id);
        $asignar->update([
            'estado'=> $this->estado
        ]);
        $this->msjedit3();
        $this->default();

    }

    public function default(){
        $this->enombre = '';
        $this->edireccion = '';
        $this->ecui = '';
        $this->ecorreo = '';
        $this->epass = '';
        $this->eusuario = '';
        $this->eestado = '';
        $this->buscar = '';
        $this->buscar2 = '';
        $this->estudiante_id='';

        $this->pnombre = '';
        $this->pdireccion = '';
        $this->enombre2 = '';
        $this->pcel = '';
        $this->pcui = '';
        $this->ppariente = '';
        $this->pcorreo = '';
        $this->ppass = '';
        $this->pusuario = '';

        $this->fecha = '';
        $this->grado_id = '';
        $this->enombre3 = '';
        $this->ciclo_id = '';
        $this->estado = '';

    }

    public function destroy($id){
        Padre::destroy($id);

        $this->msjdelete();
    }
    public function destroy2($id){
        Padresestudiante::destroy($id);

        $this->msjdelete();
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Estudiante registrado correctamente']);
    }
    public function msjexito2(){
        $this->dispatchBrowserEvent('alert',['message'=>'Padre registrado correctamente']);
    }
    public function msjexito3(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Asignación registrada correctamente']);
    }
    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Estudiante editado correctamente']);
    }
    public function msjaso(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Estudiante asociado']);
    }
    public function msjedit2(){
        $this->dispatchBrowserEvent('alerteditpadre',['message'=>'Padre editado correctamente']);
    }
    public function msjedit3(){
        $this->dispatchBrowserEvent('alerteditasignar',['message'=>'Asignación editada correctamente']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Padre eliminado correctamente']);
    }
}
