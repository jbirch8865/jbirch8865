<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Route_Right_Required implements Rule
{
    private \app\Helpers\Route $route;
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
        $this->route = new \app\Helpers\Route;
        $this->route->Load_Object_By_ID($value);
        if($this->route->Am_I_Implicitly_Allowed())
        {
            return false;
        }else
        {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->route->Get_Name().' is explicitely allowed by all';
    }
}
