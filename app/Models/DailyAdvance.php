<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyAdvance extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreAdvance',
        'seccion',
        'fecha',
        'actividad_id',
        'totalSemanal',
        'porceSemanal',
        'porceSemanalPrevio',
        'porceAcumulado',
        'user_id',
    ];

    public function activities(){
        return $this->belongsTo(Activity::class,'actividad_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function flowerpots(){
        return $this->hasMany(Flowerpot::class);
    }
}
