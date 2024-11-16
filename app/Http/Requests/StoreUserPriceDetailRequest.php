<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPriceDetailRequest extends FormRequest
{
    protected $errorBag = 'StoreUserPriceDetail';
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
            'game_id' => 'required',
            'price' => 'required|integer|max:10000'
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
            'game_id.required' => 'Kolom game harus diisi.',
            'price.required' => 'Kolom harga harus diisi.',
            'price.min' => 'Harga harus dibawah 10000.'
        ];
    }
}
