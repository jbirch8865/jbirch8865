<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Unique_Friendly_Name implements Rule
{
    private string $object_type;
    private string $value;
    /**
     * @param string $object_type \app\Helpers\Company
     */
    public function __construct(string $object_type)
    {
        $this->object_type = $object_type;
    }

    public function passes($attribute, $value)
    {
        $this->value = (string) $value;
        try
        {
            $object_type = new $this->object_type;
            $object_type->Load_By_Friendly_Name((string) $value,app()->make('Company'));
            return false;
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return true;
        }
    }

    public function message()
    {
        return 'Sorry '.$this->value.' is not a unique '.$this->object_type;
    }
}
