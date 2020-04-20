<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
class Validate_Name_Is_Not_Already_Taken implements Rule
{
    private string $object_type;
    private int $object_id;
    private string $value;
    /**
     * @param int $object_id make sure this is already a valid id
     */
    public function __construct(string $object_type)
    {
        $this->object_type = $object_type;
        $this->object_id = app()->request->role;
    }

    public function passes($attribute, $value)
    {
        $this->value = $value;
        $object = new $this->object_type;
        $object->Load_Object_By_ID($this->object_id);
        if($object->Get_Friendly_Name() == $value)
        {
            return true;
        }
        $object = new $this->object_type;
        try
        {
            $object->Load_By_Friendly_Name($value,app()->make('Company'));
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return true;
        }
        return false;
    }

    public function message()
    {
        return 'Sorry '.$this->value.' is already a role.';
    }
}
