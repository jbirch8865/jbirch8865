<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Object_With_ID implements Rule
{
    private string $object_type;
    /**
     * @param string $object_type \app\Helpers\Company
     */
    public function __construct(string $object_type)
    {
        $this->object_type = $object_type;
    }

    public function passes($attribute, $value)
    {
        try
        {
            $object_type = new $this->object_type;
            $object_type->Load_Object_By_ID($value);
            return true;
       } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return false;
        }
    }

    public function message()
    {
        return 'The id of '.$this->object_type.' was not valid.';
    }
}
