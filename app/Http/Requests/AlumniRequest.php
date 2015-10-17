<?php

namespace STMIKPLK\Http\Requests;

use STMIKPLK\Http\Requests\Request;

class AlumniRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !\Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // check if update ...
        if(($id=\Route::current()->getParameter('id',null))==null)
        {
            $id = '';
        }
        return [
            "nama_lengkap"=>"required|max:255",
            "gelar_depan"=>"max:50",
            "gelar_belakang"=>"max:50",
            "tempat_lahir"=>"required|max:100",
            "tgl_lahir"=>"required|date_format:d-m-Y",
            "NIM"=>"required|max:30|unique:profil_alumni,NIM,$id",
            "alamat_rumah"=>"required|max:500",
            "provinsi"=>"required|max:255",
            "nomor_hp"=>"required|max:255",
            "pekerjaan"=>"max:255",
            "jabatan"=>"max:255",
            "tempat_bekerja"=>"max:255",
            "user_id"=>"exists:users,id",
        ];
    }
}
