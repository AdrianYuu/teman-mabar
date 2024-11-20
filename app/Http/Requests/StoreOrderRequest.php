<?php

namespace App\Http\Requests;

use App\Rules\EndsWithZeroMinutes;
use App\Rules\WholeHourDifference;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'start_time' => ['nullable', 'date', 'before:end_time', new EndsWithZeroMinutes()],
            'end_time' => ['nullable', 'date', 'after:start_time', new EndsWithZeroMinutes()],
            'total_match' => ['nullable', 'numeric', 'min:1']
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
            'start_time.date' => 'Waktu mulai tidak valid.',
            'start_time.before' => 'Waktu mulai harus sebelum waktu selesai.',
            'start_time.ends_with_zero_minutes' => 'Waktu mulai harus berakhir dengan menit 00.',
            'end_time.date' => 'Waktu selesai tidak valid.',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai.',
            'end_time.ends_with_zero_minutes' => 'Waktu selesai harus berakhir dengan menit 00.',
            'total_match.numeric' => 'Jumlah pertandingan harus berupa angka.',
            'total_match.min' => 'Jumlah pertandingan harus lebih dari 0.'
        ];
    }
}
