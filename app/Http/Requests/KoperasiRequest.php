<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KoperasiRequest extends FormRequest
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
            'nama_koperasi' => 'required|string',
            'id_kategorikoperasi' => 'nullable|integer', // Jika ini tidak boleh kosong, ganti menjadi 'required|integer'
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan 'nullable'
            'alamat' => 'required|string',
            'kecamatan' => 'required|string', 
        ];
    }
}
