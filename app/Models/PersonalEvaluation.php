<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalEvaluation extends Model
{
    use HasFactory;

    protected $fibllable=[
        'trabajador_id',
        'area_id',
        'actividad_id',
        'metaEstablecido',
        'metaAlcanzada',
        'inspeccion',
        'calificacion',
    ];

    public function employees(){
        return $this->belongsTo(Employee::class,'trabajador_id');
    }

    public function areas(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function activities(){
        return $this->belongsTo(Activity::class,'actividad_id');
    }
}
