<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Unique_Value_In_Column implements Rule
{
    private \DatabaseLink\Column $column;
    private string $value;
    /**
     * @param string $object_type \app\Helpers\Company
     */
    public function __construct(\DatabaseLink\Column $column)
    {
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $value = $this->column->table_dblink->database_dblink->dblink->Escape_String($value);
        $this->value = $value;
        if($this->column->table_dblink->database_dblink->dblink->Does_This_Return_A_Count_Of_More_Than_Zero($this->column->table_dblink->Get_Table_Name(),$this->column->Get_Column_Name()." = '".$value."'",'understood'))
        {
            return false;
        }else
        {
            return true;
        }

    }

    public function message()
    {
        return 'Sorry '.$this->value.' already exists.';
    }
}
