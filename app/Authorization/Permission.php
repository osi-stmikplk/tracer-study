<?php

namespace STMIKPLK\Authorization;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $guarded = ['id'];
    public $timestamps = false;

    /**
     * Roles
     */
    public function roles()
    {
        return $this->morphedByMany('\STMIKPLK\Authorization\Role', 'owner');
    }

    /**
     * users
     */
    public function users()
    {
        return $this->morphedByMany('\STMIKPLK\User', 'owner');
    }

}
