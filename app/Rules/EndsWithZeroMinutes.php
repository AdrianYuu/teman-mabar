<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class EndsWithZeroMinutes implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        $time = strtotime($value);

        if ($time === false) {
            return false;
        }

        $minutes = date('i', $time);

        return $minutes === '00';
    }

    public function message()
    {
        return 'The :attribute must end with 00 minutes.';
    }
}
