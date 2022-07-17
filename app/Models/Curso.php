<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable =['cnombre','grado_id'];

    /***  relacion de estudiante a muchos padres**/
    public function cursos(){
        return $this->hasMany('App\Models\Maestrocurso','App\Models\Estudiantecurso',);
    }

    /***  relacion de grado solo tiene un nivel**/
    public function grado(){
        return $this->belongsTo('App\Models\Grado');
    }
}
