<?php
namespace app\Helpers;
    /**
     *
     */

class Program_Session extends \API\Program_Session implements iActiveRecord
{
    function __construct()
    {
        parent::__construct();
    }
    function Create_New_Session(string $client_id, \Company\Company $company, string $username, string $password, bool $only_if_user_is_active = true): void
    {
        if($this->Is_Loaded())
        {
            throw new \Active_Record\Object_Is_Already_Loaded("Program Session is already loaded");
        }
        $User = new \app\Helpers\User($username,$password,$company,false,$only_if_user_is_active);
        try
        {
            $this->Load_From_Multiple_Vars(array(array('client_id',$client_id),array('user_id',$User->Get_Verified_ID())));
            $dateTime = new \DateTime(gmdate('Y-m-d H:i:s',strtotime('+'.$User->Companies->Get_Session_Time_Limit()." seconds")));
            $this->Set_Varchar($this->table_dblink->Get_Column('access_token'),Generate_CSPRNG(45),false,false);
            $this->Set_Timestamp($this->table_dblink->Get_Column('experation_timestamp'),$dateTime,true);
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            $this->Set_Varchar($this->table_dblink->Get_Column('client_id'),$client_id,false,false);
            $this->Set_Varchar($this->table_dblink->Get_Column('access_token'),Generate_CSPRNG(45),false,false);
            $dateTime = new \DateTime(gmdate('Y-m-d H:i:s',strtotime('+'.$User->Companies->Get_Session_Time_Limit()." seconds")));
            $this->Set_Timestamp($this->table_dblink->Get_Column('experation_timestamp'),$dateTime,false);
            $this->Set_Int($this->table_dblink->Get_Column('user_id'),$User->Get_Verified_ID(),true);
        }
    }
    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    function Get_API_Response_Collection(): array
    {
        return $this->Get_Response_Collection(app()->request->input('include_details',0),app()->request->input('details_offset',0),app()->request->input('details_limit',1));
    }
}

?>
