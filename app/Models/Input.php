<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $fillable=[
        'producto',
        'lugarElaboracion',
        'fechaElaboracion',
        'fechaCosecha',
        'volumenCosecha',
        'densidad',
        'loteAsignado',
        'funcion',
    ];

    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }
}
