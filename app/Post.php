<?php

namespace STMIKPLK;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $guarded = ['id', 'author_id'];

    /**
     * Polymorphic ke beberapa tipe lainnya.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function owner()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo('\STMIKPLK\User', 'author_id');
    }
}
