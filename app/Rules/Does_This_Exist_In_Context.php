<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Does_This_Exist_In_Context implements Rule
{
    private \DatabaseLink\Column $column;
    private string $value;
    /**
     * column must already have field value set.  This does not rely on the parameter
     * actually being validated.
     */
    public function __construct(\DatabaseLink\Column $column)
    {
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $this->value = $this->column->Get_Field_Value();
        if($this->column->table_dblink->Does_This_Exist_In_Context($this->column))
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
        return 'Sorry '.$this->value.' does not exist in context.';
    }
}
