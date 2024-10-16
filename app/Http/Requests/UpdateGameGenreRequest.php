<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameGenreRequest extends FormRequest
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
                'min:5',
                'max:20',
                Rule::unique('game_genres')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($this->route('id'))
            ],
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
            'name.required' => 'The genre name is required to be filled.',
            'name.unique' => 'The genre name must be unique.',
            'name.min' => 'The genre name must be at least 5 characters.',
            'name.max' => 'The genre name must only have a maximum of 20 characters.'
        ];
    }
}
