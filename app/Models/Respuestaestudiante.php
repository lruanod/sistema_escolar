<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestaestudiante extends Model
{
    protected $fillable =['rerespuesta','reestado','repunteo','preguntaestudiante_id','cuestionario_id','cuestionarioestudiante_id'];


    /***  relacion de asignar solo tiene un estudiante**/
    public function preguntaestudiante(){
        return $this->belongsTo('App\Models\Preguntaestudiante');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionario(){
        return $this->belongsTo('App\Models\Cuestionario');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionarioestudiante(){
        return $this->belongsTo('App\Models\Cuestionarioestudiante');
    }
}
