<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class JawabanRequest extends FormRequest
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
            "nomor_soal" => "required",
            "jawaban" => "required",

        ];
    }

    public function messages()
    {
        return [
            "nomor_soal.required" => "Wajib diisi",
            "jawaban.required" => "Wajib diisi",

        ];
    }
    public function peserta()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
