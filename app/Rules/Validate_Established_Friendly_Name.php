<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Established_Friendly_Name implements Rule
{
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        $this->value = (string) $value;
        try
        {
            $object_type = new $this->object_type;
            $object_type->Load_By_Friendly_Name((string) $value,app()->make('Company'));
            return true;
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return false;
        }
    }


    public function message()
    {
        return 'Sorry '.$this->value.' is not a '.$this->object_type;
    }
}
