<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestrocurso extends Model
{
    protected $fillable =['fecha','maestro_id','curso_id','estado'];

    /***  relacion de asignar solo tiene un grado**/
    public function maestro(){
        return $this->belongsTo('App\Models\Mestro');
    }
    /***  relacion de asignar solo tiene un estudiante**/
    public function curso(){
        return $this->belongsTo('App\Models\Curso');
    }

    /***  relacion de estudiante a muchos padres**/
    public function maestrocursos(){
        return $this->hasMany('App\Models\Online','App\Models\Tarea','App\Models\Maestroarchivo','App\Models\Cuestionario','App\Models\Pregunta','App\Models\Respuesta');
    }

}
