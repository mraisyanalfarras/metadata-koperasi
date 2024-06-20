<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanRequest extends FormRequest
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
            'nik' => 'required|string',
            'email' => 'required|string',
            'nama' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d',
            'id_jenis_surats' => 'required|integer',
            'ktp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kk' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'required|string',
        ];
    }
}
