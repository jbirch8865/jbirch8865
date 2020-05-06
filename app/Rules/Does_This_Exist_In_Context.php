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
    public function __construct(\DatabaseLink\Column $column,bool $include_inactive = false)
    {
        $this->column = $column;
        $all_exists = false;
        $only_active_exists = false;
        if($this->passes(false,true))
        {
            $all_exists = true;
        }
        if($this->passes(false,false))
        {
            $only_active_exists = true;
        }
        if(!$include_inactive)
        {
            if($all_exists && !$only_active_exists)
            {
                Response_422(['message' => 'Sorry '.$this->value.' in context of '.$column->table_dblink->Get_Table_Name().' is currently disabled.'],app()->request)->send();
                exit();
            }elseif(!$all_exists)
            {
                Response_422(['message' => 'Sorry I can\'t find '.$this->value.' in context of '.$column->table_dblink->Get_Table_Name().'.'],app()->request)->send();
                exit();
            }
        }else
        {
            if(!$all_exists)
            {
                Response_422(['message' => 'Sorry I can\'t find '.$this->value.' in context of '.$column->table_dblink->Get_Table_Name().'.'],app()->request)->send();
                exit();
            }
        }
    }

    public function passes($attribute, $include_inactive)
    {
        $this->value = $this->column->Get_Field_Value();
        if($this->column->table_dblink->Does_This_Exist_In_Context($this->column,$include_inactive))
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
        return false;
    }
}
