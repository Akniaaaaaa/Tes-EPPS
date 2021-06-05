<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class JadwalRequest extends FormRequest
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
            "tanggal_tes" => "required",
            "jam_tes" => "required",
            "waktu" => "required",
            "id_peserta" => "required",

        ];
    }

    public function messages()
    {
        return [
            "jam_tes.required" => "Wajib diisi",
            "tanggal_tes.required" => "Wajib diisi",
            "waktu.required" => "Wajib diisi",
            "id_peserta.required" => "Wajib diisi",

        ];
    }
    public function peserta()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
