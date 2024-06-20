<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisRequest extends FormRequest
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
            'kode_surat' => 'required|string',
            'nama_surat' => 'required|string',
        ];
    }

    public function messages():array
    {
        return[
            'kode_surat.required' => 'Kode Surat harus diisi',
            'nama_surat.required' => 'Nama Surat harus diisi',
        ];
    }
}
