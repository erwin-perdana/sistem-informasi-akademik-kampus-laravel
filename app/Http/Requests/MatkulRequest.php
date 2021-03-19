<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatkulRequest extends FormRequest
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
            'kode' => 'required',
            'matkul' => 'required',
            'sks' => 'required|integer',
            'kategori' => 'required|string',
            'smt' => 'required|integer',
            'id_prodi' => 'required|integer',
        ];
    }
}
