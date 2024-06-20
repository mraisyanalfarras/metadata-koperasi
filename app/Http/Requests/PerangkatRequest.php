<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerangkatRequest extends FormRequest
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
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages():array
    {
        return[
            'nama.required' => 'Nama harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
            'foto.image' => 'File harus berupa jpg, png, jpeg',
        ];
    }
}
