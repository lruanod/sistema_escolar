<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntaestudiante extends Model
{
    protected $fillable =['cuestionarioestudiante_id','pregunta_id','cuestionario_id'];



    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionarioestudiante(){
        return $this->belongsTo('App\Models\Cuestionarioestudiante');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function pregunta(){
        return $this->belongsTo('App\Models\Pregunta');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionario(){
        return $this->belongsTo('App\Models\Cuestionario');
    }

    /***  relacion de estudiante a muchos padres**/
    public function preguntaestudiante(){
        return $this->hasMany('App\Models\Respuestaestudiante');
    }
}
