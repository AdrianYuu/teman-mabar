<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3'
            ],
            'email' => [
                'required',
                'string',
                'ends_with:@gmail.com',
                Rule::unique('users')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[0-9]/',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[@$!%*?&#]/'
            ],
            'password_confirmation' => [
                'required',
                'same:password'
            ]
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
            'name.required' => 'Kolom nama wajib diisi.',
            'name.min' => 'Kolom nama minimal memiliki 3 karakter',
            'email.required' => 'Kolom email wajib diisi.',
            'email.ends_with' => 'Kolom email harus diakhiri dengan @gmail.com',
            'email.unique' => 'Kolom email harus unik',
            'password.required' => 'Kolom kata sandi wajib diisi',
            'password.min' => 'Kolom password minimal memiliki 8 karakter',
            'password.confirmed' => 'Kolom password tidak sama dengan kolom konfirmasi kata sandi',
            'password.regex:/[0-9]/' => 'Kata sandi harus mengandung setidaknya satu angka.',
            'password.regex:/[a-z]/' => 'Kata sandi harus mengandung setidaknya satu huruf kecil.',
            'password.regex:/[A-Z]/' => 'Kata sandi harus mengandung setidaknya satu huruf besar.',
            'password.regex:/[@$!%*?&#]/' => 'Kata sandi harus mengandung setidaknya satu karakter spesial.',
            'password_confirmation.required' => 'Kolom konfirmasi kata sandi wajib diisi ',
            'password_confirmation.same:password' => 'Kolom konfirmasi kata sandi harus sama dengan kolom kata sandi'
        ];
    }
}
