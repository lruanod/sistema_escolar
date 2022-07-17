<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $fillable =['mnombre','mdireccion','mcui','mcel','mpass','musuario','mcorreo','mestado','murl'];

    /***  relacion de estudiante a muchos padres**/
    public function maestros(){
        return $this->hasMany('App\Models\Maestrocurso');
    }

}
