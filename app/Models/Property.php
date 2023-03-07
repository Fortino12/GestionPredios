<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable=[
        'estado',
        'municipio',
        'direccion',
        'nombrePredio',
    ]; 

    public function area(){
        return $this->hasMany(Area::class);
    }

    public function plagues(){
        return $this->hasMany(Plague::class);
    }
}
