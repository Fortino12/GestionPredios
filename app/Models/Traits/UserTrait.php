<?php

namespace App\Models\Traits;
use App\Models\Role;

trait UserTrait{

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimesTamps();
    }

    public function havePermission($permission){
        foreach ($this->roles as $role) {
            if ($role["full_access"] == "Si") {
                return true;
            }

            foreach ($role->permissions as $perm) {
                if ($perm->slug == $permission ) {
                    return true;
                }
            }
        }
        return false;
    }

}