<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use toolbelt;
class Company_Valid implements Rule
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
        $toolbelt = new toolbelt;
        $value = $toolbelt->root_dblink->Escape_String((string) $value);
        return $toolbelt->Users->database_dblink->dblink->Does_This_Return_A_Count_Of_More_Than_Zero('Companies',"`id` = '".$value."'",'understood');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Company does not exist.';
    }
}
