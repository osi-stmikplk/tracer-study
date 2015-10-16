<?php

namespace STMIKPLK\Authorization;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('\STMIKPLK\User', 'role_user');
    }

    /**
     * Ingat ini adalah relasi polymorphic many to many!
     */
    public function permissions()
    {
        return $this->morphToMany('\STMIKPLK\Authorization\Permission', 'owner', 'permission_owner');
    }
}
