<?php

namespace App\Http\Requests;

use App\Rules\EndsWithZeroMinutes;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionRequest extends FormRequest
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
            'name' => ['required'],
            'description' => ['required'],
            'coin_prize' => ['required', 'min:1'],
            'coin_register' => ['required', 'min:1'],
            'team_count' => ['required', 'min:2'],
            'register_start_date' => ['date', 'before:register_finish_date', new EndsWithZeroMinutes()],
            'register_finish_date' => ['date', 'after:register_start_date', new EndsWithZeroMinutes()],
            'competition_start_date' => ['date', 'before:competition_finish_date', new EndsWithZeroMinutes()],
            'competition_finish_date' => ['date', 'after:competition_start_date', new EndsWithZeroMinutes()],
            'whatsapp' => ['required'],
            'game_id' => ['required'],
            'type' => ['required']
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
            'name.required' => 'Kolom nama harus diisi.',
        ];
    }
}
