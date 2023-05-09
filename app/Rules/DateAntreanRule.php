<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateAntreanRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       return date('Y-m-d',strtotime($value)) <= date('Y-m-d', strtotime('3 days'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Anda hanya boleh mendaftar hingga 3 hari kedepan';
    }
}
