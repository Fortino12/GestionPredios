<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flowerpot extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreMacetero',
        'plaga_id',
        'enfermedad_id',
        'avanceDiario_id',
    ];

    public function plagues(){
        return $this->belongsTo(Plague::class,'plaga_id');
    }

    public function illnesses(){
        return $this->belongsTo(Illness::class,'enfermedad_id');
    }

    public function dailyAdvances(){
        return $this->belongsTo(DailyAdvance::class,'avanceDiario_id');
    }
}
