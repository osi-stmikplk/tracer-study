<?php

namespace STMIKPLK;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $guarded = ['id'];

    /**
     * Satu lowongan satu post
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function post()
    {
        return $this->morphOne('\STMIKPLK\Post', 'owner');
    }
}
