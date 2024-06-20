<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPasarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'namapasar' => 'required|string',
            'id_kecamatan' => 'nullable|integer', // Jika ini tidak boleh kosong, ganti menjadi 'required|integer'
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan 'nullable'
            'alamat' => 'required|string',
            'jumlah_kios' => 'required|integer', // Mengubah menjadi 'integer'
        ];
    }
}
