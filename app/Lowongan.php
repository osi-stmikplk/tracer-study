<?php

namespace STMIKPLK;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan';
    protected $guarded = ['id'];

    public function setTglExpiredAttribute($value)
    {
        $this->attributes['tgl_expired'] = convert_date_to('d-m-Y', $value);
    }
    public function getTglExpiredAttribute($value)
    {
        return convert_date_to('Y-m-d', $value, 'd-m-Y');
    }

    /**
     * Satu lowongan satu post
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function post()
    {
        return $this->morphOne('\STMIKPLK\Post', 'owner');
    }
}
