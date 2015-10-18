<?php

namespace STMIKPLK\Http\Requests;

use STMIKPLK\Http\Requests\Request;

class PengumumanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "tgl_tayang"=>"required|date_format:d-m-Y",
            "tgl_expired"=>"required|date_format:d-m-Y",
            "judul"=>"required|max:255",
            "isi"=>"required",
        ];
    }
}
