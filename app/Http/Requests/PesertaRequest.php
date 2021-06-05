<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesertaRequest extends FormRequest
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
            "nama" => "required",
            "email" => "required",
            "no_hp" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "alamat" => "required",
            "jenis_kelamin" => "required",
            "password" => "required",
            "password_confirmation" => "required",
            "foto" => "required|file|image:jpeg,png,jpg",

        ];
    }

    public function messages()
    {
        return [
            "nama.required" => "Nama Wajib diisi",
            "email.required" => "Email Wajib diisi",
            "no_hp.required" => "Nomor Telepon Wajib diisi",
            "tanggal_lahir.required" => "Tanggal Lahir Wajib diisi",
            "tempat_lahir.required" => "Tempat Lahir Wajib diisi",
            "alamat.required" => "Alamat Wajib diisi",
            "jenis_kelamin.required" => "Jenis Kelamin Wajib diisi",
            "password.required" => "Password Wajib diisi",
            "password_confirmation.required" => "Konfirmasi Password Wajib diisi",
            "foto.required" => "Foto Password Wajib diisi",


        ];
    }
}
