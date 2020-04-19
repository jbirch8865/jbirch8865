<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Route_Module_Name implements Rule
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
        $toolbelt = new \toolbelt;
        $value = $toolbelt->root_dblink->Escape_String($value);
        if($toolbelt->Routes->database_dblink->dblink->Does_This_Return_A_Count_Of_More_Than_Zero('Routes','WHERE `module` = '.$value,'understood'))
        {
            return true;
        }else
        {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The module doesn\'t exist';
    }
}
