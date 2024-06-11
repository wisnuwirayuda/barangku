<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanBarang extends FormRequest
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
            'nama-barang'       => 'required|string',
            'quantity'          => 'required|integer',
            'alamat'            => 'required|string',
            'nama-bank'         => 'required|string',
            'nomor-rekening'    => 'required|string'
        ];
    }
}
