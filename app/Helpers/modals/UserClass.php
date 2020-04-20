<?php
namespace app\Helpers;


/**
     * @throws Incorrect_Password
     * @throws User_Does_Not_Exist
     * @throws UpdateFailed
     * @throws Varchar_Too_Long_To_Set if creating a user and the password is too long
     * @param bool $only_if_active if $create_user is true this will be ignored, if we are loading / authorizing credentials this will load even if user is inactive
     * @throws Object_Is_Currently_Inactive
     * @param string $unverified_password to skip checking the password use 'skip_check' as the password
     */

class User extends \Authentication\User implements iActiveRecord
{
    function __construct(string $unverified_username,string $unverified_password,\Company\Company $company,bool $create_user = false,bool $only_if_active = true)
    {
        parent::__construct($unverified_username,$unverified_password,$company,$create_user,$only_if_active);
    }

    public function Get_Active_Status() : bool
    {
        return $this->Is_Object_Active();
    }

    /**
     * @throws Varchar_Too_Long_To_Set
     */
    public function Change_Password(?string $new_password) : void
    {
        if(is_null($new_password)){return;}
        if($new_password)
        {
            $password = $this->Hash_Password($new_password);
            $this->Set_Varchar($this->table_dblink->Get_Column('verified_hashed_password'),$password,false,false);
            $this->Update_Object();
        }
    }
    public function Delete_User(bool $mark_inactive = true)
    {
        if($this->Get_Username() == 'default' && !$mark_inactive)
        {
            Response_401(['message' => 'Sorry the default user cannot be permanently deleted'],app()->request)->send();
            exit();
        }
        parent::Delete_User($mark_inactive);
    }

    public function Delete_Active_Record() : void
    {
        app()->request->validate([
            'active_status' => ['required','bool']
        ]);
        $this->Delete_User(app()->request->input('active_status'));
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
