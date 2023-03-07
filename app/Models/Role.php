<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombreRol',
        'slug',
        'descripcion',
        'full_access',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withTimesTamps();
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
