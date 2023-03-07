<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable=[
        'codigo',
        'descripcion',
    ];

    public function dailyadvances(){
        return $this->hasMany(DailyAdvance::class);
    }

    public function wages(){
        return $this->hasMany(Wage::class);
    }

    public function personalevaluations(){
        return $this->hasMany(PersonalEvaluation::class);
    }
}
