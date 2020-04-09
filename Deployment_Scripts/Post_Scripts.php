<?php
Add_All_Constraints();
Add_All_Multi_Column_Unique_Indexes();
Create_Configs();
Override_Master_Role();
function Create_Configs()
{
    /*
    $config = new \Company\Config();
    $config->Create_Or_Update_Config('company_time_zone','UTC');
    */
}
function Add_Column_Constraint(\DatabaseLink\Column $from_column,\DatabaseLink\Column $to_column):void
{
    $from_column->Add_Constraint_If_Does_Not_Exist($to_column);
}

function Add_All_Constraints()
{
    global $toolbelt_base;
    $columns = [
        [['Routes_Have_Roles','route_id'],['Routes','id']],
        [['Routes_Have_Roles','role_id'],['Company_Roles','id']],
        [['Routes_Have_Roles','right_id'],['Rights','id']],
    ];

    ForEach($columns as $index => $value)
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

function Override_Master_Role()
{
    $company = new \app\Helpers\Company;
    $company->Load_Company_By_ID(1);
    $role = $company->Get_Master_Role();
    $role->Delete_Role(false);
    $company->Create_Company_Role('master');
    $user = new \Authentication\User('default',$company->cConfigs->Get_Client_ID(),$company,false);
    $user->Assign_Company_Role($company->Get_Master_Role());
}
?>