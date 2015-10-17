<?php

namespace STMIKPLK;

use Illuminate\Database\Eloquent\Model;

class ProfilAlumni extends Model
{
    protected $table = 'profil_alumni';
    protected $guarded = ['id', 'user_id'];

    public function setTglLahirAttribute($value)
    {
        $this->attributes['tgl_lahir'] = convert_date_to('d-m-Y', $value);
    }

    public function getTglLahirAttribute($value)
    {
        return convert_date_to('Y-m-d', $value, 'd-m-Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return convert_date_to('Y-m-d', $value, 'd-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return convert_date_to('Y-m-d', $value, 'd-m-Y');
    }
}
