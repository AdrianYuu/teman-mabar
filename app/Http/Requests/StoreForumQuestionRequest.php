<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForumQuestionRequest extends FormRequest
{
    protected $errorBag = 'StoreForumQuestion';
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
            'title' => 'required|string|min:10|max:100',
            'question' => 'required|string|min:100|max:1000',
            'terms' => 'accepted'
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
            'title.required' => 'Kolom judul harus diisi.',
            'title.min' => 'Panjang judul minimal 10 karakter.',
            'title.max' => 'Panjang judul maksimal 100 karakter.',
            'question.required' => 'Kolom pertanyaan harus diisi.',
            'question.min' => 'Panjang pertanyaan minimal 100 karakter.',
            'question.max' => 'Panjang pertanyaan maksimal 1000 karakter.',
            'terms.accepted' => 'Syarat dan ketentuan harus dibaca dan diisi.'
        ];
    }
}
