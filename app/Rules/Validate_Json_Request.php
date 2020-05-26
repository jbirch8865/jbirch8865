<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Test_Tools\Toolbelt;

class Validate_Json_Request implements Rule
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
        $toolbelt = new Toolbelt;
        if(app()->request->isJson()) {
            if(empty(app()->request->json()->all())) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Json.';
    }
}
