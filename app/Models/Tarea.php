<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable =['fcreado','ffinalizacion','tdescripcion','titulo','punteo','maestrocurso_id','testado'];
    protected $casts=[
        'fcreado'=> 'datetime:d-m-Y H:i',
        'ffinalizacion'=> 'datetime:d-m-Y H:i'
    ];
    /***  relacion de asignar solo tiene un estudiante**/
    public function maestrocurso(){
        return $this->belongsTo('App\Models\Maestrocurso');
    }


    /***  relacion de estudiante a muchos padres**/
    public function tareas(){
        return $this->hasMany('App\Models\Maestroarchivo','App\Models\Entregatarea');
    }
}
