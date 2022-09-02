<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TelRule implements Rule
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
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //https://qiita.com/y9025/items/294f2318842a27656cbf
        return preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $value);
    }

    /**
     * Get the validation error message.
     * @return string
     */
    public function message()
    {
        return trans('validation.user_tel');
    }
}
