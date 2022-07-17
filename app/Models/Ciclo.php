<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $fillable =['ano'];


    /***  relacion de estudiante a muchos padres**/
    public function ciclos(){
        return $this->hasMany('App\Models\Asignaciongrado');
    }
}
