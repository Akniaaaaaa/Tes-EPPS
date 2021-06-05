<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoalRequest extends FormRequest
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
            "pilihan_a" => "required",
            "pilihan_b" => "required",

        ];
    }

    public function messages()
    {
        return [
            "pilihan_a.required" => "Wajib diisi",
            "pilihan_b.required" => "Wajib diisi",

        ];
    }
}
