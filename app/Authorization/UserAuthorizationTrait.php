<?php
/**
 * Ditambahkan oleh User untuk relasi terhadap Authorization
 * User: toni
 * Date: 16/10/15
 * Time: 20:18
 */

namespace STMIKPLK\Authorization;


trait UserAuthorizationTrait
{

    /**
     * Relasi terhadap roles
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('\STMIKPLK\Authorization\Role', 'role_user');
    }

    /**
     * Ingat ini adalah relasi polymorphic many to many!
     */
    public function permissions()
    {
        return $this->morphToMany('\STMIKPLK\Authorization\Permission', 'owner', 'permission_owner');
    }

    /**
     * Add Role to user
     * @param string|Role $role name of role or model of role!
     */
    public function addRole($role)
    {
        /** @var Authorization $a */
        $a = app('STMIKPLK\Authorization\AuthorizationInterface');
        $r = $role instanceof Role? $role: $a->getRole($role);
        return $this->roles()->attach($r);
    }

    /**
     * Remove Role from current User
     * @param string|Role $role name or role or model of role
     * @return bool
     */
    public function removeRole($role)
    {
        /** @var Authorization $a */
        $a = app('STMIKPLK\Authorization\AuthorizationInterface');
        $r = $role instanceof Role? $role: $a->getRole($role);
        return $this->roles()->detach($r) > 0;
    }


}