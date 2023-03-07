<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable=[
        'cota',
        'descripcion',
        'predio_id',
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function properties(){
        return $this->belongsTo(Property::class,'predio_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_id')->withTimesTamps();
    }

    public function emforcements(){
        return $this->hasMany(Emforcement::class);
    }

    public function assistances(){
        return $this->hasMany(Assistance::class);
    }

    public function personalevaluations(){
        return $this->hasMany(PersonalEvaluation::class);
    }

    public function wages(){
        return $this->hasMany(Wage::class);
    }

    public function plagues(){
        return $this->hasMany(Plague::class);
    }
}
