<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopUpRequest extends FormRequest
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
            'coin_amount' => ['required', 'numeric', 'min:1'],
            'payment_id' => ['required']
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'coin_amount.required' => 'Kolom jumlah koin harus diisi.',
            'coin_amount.numeric' => 'Jumlah koin harus berupa angka.',
            'coin_amount.min' => 'Jumlah koin harus lebih dari 0.',
            'payment_id.required' => 'Kolom metode pembayaran harus diisi.'
        ];
    }
}
