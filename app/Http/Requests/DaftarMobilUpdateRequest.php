<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaftarMobilUpdateRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100000', // pastikan image tidak selalu required
            'nama' => 'required|string',
            'merk' => 'required|string',
            'kursi' => 'required|integer',
            'bahan_bakar' => 'required|string',
            'harga' => 'required|numeric',
        ];
    }
}
