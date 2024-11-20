<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class WholeHourDifference implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        $startTime = request('start_time');
        $endTime = request('end_time');

        if (!$startTime || !$endTime) {
            return true;
        }

        $differenceInSeconds = strtotime($endTime) - strtotime($startTime);

        return $differenceInSeconds % 3600 === 0;
    }

    public function message()
    {
        return 'The difference between start time and end time must be a whole number of hours.';
    }
}
