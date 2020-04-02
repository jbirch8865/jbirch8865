<?php
Add_All_Constraints();
Add_All_Multi_Column_Unique_Indexes();
Create_Configs();
function Create_Configs()
{
    /*
    $config = new \Company\Config();
    $config->Create_Or_Update_Config('company_time_zone','UTC');
    */
}
function Add_All_Constraints()
{
    global $toolbelt_base;
    $from_to_columns = [
        [['Routes_Have_Roles'=>'route_id'],['Routes'=>'id']],
        [['Routes_Have_Roles'=>'role_id'],['Roles'=>'id']],
        [['Routes_Have_Roles'=>'right_id'],['Rights'=>'id']],
    ];

    ForEach($from_to_columns as $index => $value)
    {
        $from_column_name = $value[0][1];
        $from_table_name = $value[0][0];
        $to_column_name = $value[1][1];
        $to_table_name = $value[1][0];
        $from_column = new \DatabaseLink\Column($from_column_name,$toolbelt_base->$from_table_name);
        $to_column = new \DatabaseLink\Column($to_column_name,$toolbelt_base->$to_table_name);
        Add_Column_Constraint($from_column,$to_column);            
    }    
}
function Add_All_Multi_Column_Unique_Indexes()
{
    global $toolbelt_base;
    $toolbelt_base->Routes_Have_Roles->Add_Unique_Columns(array('route_id','role_id'));
}
?>