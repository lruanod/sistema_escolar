<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaciongrado extends Model
{
    protected $fillable =['fecha','grado_id','estudiante_id','ciclo_id','estado'];
    /***  relacion de asignar solo tiene un ciclo**/
    public function ciclo(){
        return $this->belongsTo('App\Models\Ciclo');
    }
    /***  relacion de asignar solo tiene un grado**/
    public function grado(){
        return $this->belongsTo('App\Models\Grado');
    }
    /***  relacion de asignar solo tiene un estudiante**/
    public function estudiante(){
        return $this->belongsTo('App\Models\Estudiante');
    }

    /***  relacion de estudiante a muchos padres**/
    public function asignaciongrados(){
        return $this->hasMany('App\Models\Estudiantecurso','App\Models\Cuota');
    }

}
