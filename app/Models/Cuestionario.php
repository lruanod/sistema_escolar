<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $fillable =['fcreado','ffinalizacion','cdescripcion','cestado','titulo','punteo','maestrocurso_id','reintento','cantidadp'];
    protected $casts=[
        'fcreado'=> 'datetime:d-m-Y H:i',
        'ffinalizacion'=> 'datetime:d-m-Y H:i'
    ];
    /***  relacion de asignar solo tiene un estudiante**/
    public function maestrocurso(){
        return $this->belongsTo('App\Models\Maestrocurso');
    }

    /***  relacion de estudiante a muchos padres**/
    public function cuestionarios(){
        return $this->hasMany('App\Models\Pregunta','App\Models\Cuestionarioestudiante','App\Models\Respuestaestudiante','App\Models\Respuesta','App\Models\Preguntaestudiante');
    }
}
