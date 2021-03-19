<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'id_prodi' => 'integer',
            'id_ta' => 'integer',
            'id_kelas' => 'required|integer',
            'id_matkul' => 'required|integer',
            'id_dosen' => 'required|integer',
            'hari' => 'required|string',
            'waktu' => 'required|string',
            'id_ruangan' => 'required|integer',
        ];
    }
}
