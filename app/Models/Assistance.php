<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

    protected $fillable=[
        'trabajador_id',
        'area_id',
        'estatus',
        'fecha',
    ];

    public function areas(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function employees(){
        return $this->belongsTo(Employee::class,'trabajador_id');
    }
}
