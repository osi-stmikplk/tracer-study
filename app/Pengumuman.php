<?php

namespace STMIKPLK;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $guarded = ['id'];

    public function setTglTayangAttribute($value)
    {
        $this->attributes['tgl_tayang'] = convert_date_to('d-m-Y', $value);
    }
    public function getTglTayangAttribute($value)
    {
        return convert_date_to('Y-m-d', $value, 'd-m-Y');
    }
    public function setTglExpiredAttribute($value)
    {
        $this->attributes['tgl_expired'] = convert_date_to('d-m-Y', $value);
    }
    public function getTglExpiredAttribute($value)
    {
        return convert_date_to('Y-m-d', $value, 'd-m-Y');
    }

    /**
     * Memiliki satu post, dan bukan many polymorphic ke post
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function post()
    {
        return $this->morphOne('\STMIKPLK\Post', 'owner');
    }
}
