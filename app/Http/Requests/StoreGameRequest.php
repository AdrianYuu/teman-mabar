<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'genre_id' => 'required',
            'name' => 'required|string|min:5|max:20',
            'game_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048'
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
            'genre_id.required' => 'The genre is required to be filled.',
            'name.required' => 'The game name is required to be filled.',
            'name.min' => 'The game name must be at least 5 characters.',
            'name.max' => 'The game name must only have a maximum of 20 characters.',
            'game_picture.required' => 'The game picture is required.',
            'game_picture.mimes' => 'The game picture file must be either .jpg, .png, or .jpeg.',
            'game_picture.max' => 'The game picture file size must not more than 2mb.'
        ];
    }

}
