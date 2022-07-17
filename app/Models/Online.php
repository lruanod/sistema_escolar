<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $fillable =['ourl','odescripcion','fecha','estado','maestrocurso_id'];
    protected $casts=[
        'fecha'=> 'datetime:d-m-Y H:i'
    ];
    /***  relacion de asignar solo tiene un estudiante**/
    public function maestrocurso(){
        return $this->belongsTo('App\Models\Maestrocurso');
    }
}
