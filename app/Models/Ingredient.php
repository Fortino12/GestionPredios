<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'solido',
        'cantidadKg',
        'liquido',
        'cantidadLiquido',
        'insumo_id',
    ];

    public function inputs(){
        return $this->belongsTo(Input::class,'insumo_id');
    }
}
