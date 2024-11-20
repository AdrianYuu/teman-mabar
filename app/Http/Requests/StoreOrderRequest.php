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
}
