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
            'description.required' => 'Kolom deskripsi harus diisi.',
            'coin_prize.required' => 'Kolom hadiah koin harus diisi.',
            'coin_prize.min' => 'Hadiah koin harus lebih dari 0.',
            'coin_register.required' => 'Kolom biaya pendaftaran harus diisi.',
            'coin_register.min' => 'Biaya pendaftaran harus lebih dari 0.',
            'team_count.required' => 'Kolom jumlah tim harus diisi.',
            'team_count.min' => 'Jumlah tim harus minimal 2.',
            'register_start_date.date' => 'Tanggal mulai pendaftaran tidak valid.',
            'register_start_date.before' => 'Tanggal mulai pendaftaran harus sebelum tanggal selesai pendaftaran.',
            'register_finish_date.date' => 'Tanggal selesai pendaftaran tidak valid.',
            'register_finish_date.after' => 'Tanggal selesai pendaftaran harus setelah tanggal mulai pendaftaran.',
            'competition_start_date.date' => 'Tanggal mulai kompetisi tidak valid.',
            'competition_start_date.before' => 'Tanggal mulai kompetisi harus sebelum tanggal selesai kompetisi.',
            'competition_finish_date.date' => 'Tanggal selesai kompetisi tidak valid.',
            'competition_finish_date.after' => 'Tanggal selesai kompetisi harus setelah tanggal mulai kompetisi.',
            'whatsapp.required' => 'Kolom link grup WhatsApp harus diisi.',
            'game_id.required' => 'Kolom permainan harus diisi.',
            'type.required' => 'Kolom tipe kompetisi harus diisi.',
        ];
    }
}
