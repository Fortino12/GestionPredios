<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plague extends Model
{
    use HasFactory;

    protected $fillable=[
        'predio_id',
        'jornal',
        'area_id',
        'superficie',
        'cultivo',
        'nombrePlaga',
        'puntoMuestra',
        'nombreEnfermedad',
    ];

    public function properties(){
        return $this->belongsTo(Property::class,'predio_id');
    }

    public function areas(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function wages(){
        return $this->hasMany(Wage::class);
    }
}
