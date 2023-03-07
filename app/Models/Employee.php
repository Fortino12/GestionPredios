<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=[
        'curp',
        'nombreTrabajador',
        'paternoTrabajador',
        'maternoTrabajador',
        'sexo',
        'telefono',
        'area_id',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function areas(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function assistances(){
        return $this->hasMany(Assistance::class);
    }

    public function personalevaluations(){
        return $this->hasMany(PersonalEvaluation::class);
    }
}
