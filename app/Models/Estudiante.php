<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable =['enombre','edireccion','ecui','ecorreo','epass','eusuario','eestado','eurl'];

    /***  relacion de estudiante a muchos padres**/
    public function estudiantes(){
        return $this->hasMany('App\Models\Padreestudiante','App\Models\Asignaciongrado',);
    }
}
