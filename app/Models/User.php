<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\UserTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,UserTrait ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'fechaNacimiento',
        'sexo',
        'telefono',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }


    public function areas(){
        return $this->belongsToMany(Area::class)->withTimesTamps();
    }

    public function enforcements(){
        return $this->hasMany(Enforcement::class);
    }

    public function dailyadvances(){
        return $this->hasMany(DailyAdvance::class);
    }

    public function roles(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
