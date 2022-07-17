<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantecurso extends Model
{
    protected $fillable =['curso_id','asignaciongrado_id'];

    /***  relacion de asignar solo tiene un grado**/
    public function asignaciongrado(){
        return $this->belongsTo('App\Models\Asignaciongrado');
    }
    /***  relacion de asignar solo tiene un estudiante**/
    public function curso(){
        return $this->belongsTo('App\Models\Curso');
    }
    /***  relacion de estudiante a muchos padres**/
    public function estudiantecursos(){
        return $this->hasMany('App\Models\Entregatarea','App\Models\Estudiantearchivo','App\Models\Zona');
    }
}
