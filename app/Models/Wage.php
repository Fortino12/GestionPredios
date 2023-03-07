<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    use HasFactory;

    protected $fillable=[
        'actividad_id',
        'area_id',
        'fecha',
        'estatus',
    ];

    public function activities(){
        return $this->belongsTo(Activity::class,'actividad_id');
    }

    public function area(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function plagues(){
        return $this->hasMany(Plague::class);
    }
}
