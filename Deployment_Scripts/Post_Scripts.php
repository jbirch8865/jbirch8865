<?php
Add_All_Constraints();
Add_All_Multi_Column_Unique_Indexes();
Create_Configs();
Override_Master_Role();
Build_Routes();
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

function Build_Routes()
{
    Create_Route_If_Not_Exist('User_Signin','',true);
    Create_Route_If_Not_Exist('List_Users','Company',false);
    Create_Route_If_Not_Exist('Create_User','Company',false);
    Create_Route_If_Not_Exist('List_Companies','',true);
    Create_Route_If_Not_Exist('Create_Company','',true);
    Create_Route_If_Not_Exist('List_Roles','Company',false);
    Create_Route_If_Not_Exist('Update_User','Company',false);
    
}

function Create_Route_If_Not_Exist(string $name,string $module,bool $implicit_allow = false)
{
    try
    {
        $route = new \app\Helpers\Route;
        $route->Load_From_Route_Name($name);
        $route->Set_Implicit_Allow($implicit_allow);
        $route->Set_Module_Name($module);
    } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
    {
        $route->Set_Name($name,false);
        $route->Set_Module_Name($module,false);
        $route->Set_Implicit_Allow($implicit_allow,true);
    }
}
?>