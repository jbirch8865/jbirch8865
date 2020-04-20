<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Active_Status_True implements Rule
{
    public function __construct()
    {
        //
    }
    public function passes($attribute, $value)
    {
        if($value !== true)
        {
            return false;
        }else
        {
            return true;
        }
    }
    public function message()
    {
        return 'The active status can only be true when updating the object.  Use {Delete} method to deactivate object.';
    }
}
