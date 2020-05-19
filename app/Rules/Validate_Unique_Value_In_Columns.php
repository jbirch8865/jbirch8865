<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validate_Unique_Value_In_Columns implements Rule
{
    private array $columns;
    private \DatabaseLink\Column $column;
    private string $value;
    /**
     * @param string $object_type \app\Helpers\Company
     * @param array $columns [\DatabaseLink\Column] to Limit in the where statement 'AND `table_name`.`column_name` = `column_field_value`
     * @param array $tables [\DatabaseLink\Table] to inner join to the query
     */
    public function __construct(array $columns,\DatabaseLink\Column $column,array $tables = [])
    {
        $this->column = $column;
        $this->tables = $tables;
//        Validate_Array_Types($columns,'DatabaseLink\Column');
        $this->columns = $columns;
    }

    public function passes($attribute, $value)
    {
        $this->value = $value;
        $toolbelt = new \Test_Tools\toolbelt;
        $table_name = $this->column->table_dblink->Get_Table_Name();
        ForEach($this->columns as $key => $column)
        {
            if($key === array_key_first($this->columns))
            {
                $toolbelt->tables->$table_name->LimitBy($column->Equals($column->Get_Field_Value()));
            }else
            {
                $toolbelt->tables->$table_name->AndLimitBy($column->Equals($column->Get_Field_Value()));
            }
        }
        $toolbelt->tables->$table_name->AndLimitBy($this->column->Equals($value));
        $toolbelt->tables->$table_name->Query_Table(['id']);
        if($toolbelt->tables->$table_name->Get_Number_Of_Rows_In_Query() > 0)
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
