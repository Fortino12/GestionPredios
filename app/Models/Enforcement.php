<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enforcement extends Model
{
    use HasFactory;

    protected $fillable=[
        'area_id',
        'fechaAplicacion',
        'nombreComercial',
        'noRegistro',
        'noLote',
        'toxicologia',
        'ingrediente',
        'dosis',
        'plagaoEnfermedad',
        'nutriccion',
        'responsable',
        'autorizo',
    ];

    public function area(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function responsable(){
        return $this->belongsTo(User::class,'responsable');
    }

    public function autorizo(){
        return $this->belongsTo(User::class,'autorizo');
    }
}
