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
    public function Change_Password(string $new_password) : void
    {
        $password = $this->Hash_Password($new_password);
        $this->Set_Varchar($this->table_dblink->Get_Column('verified_hashed_password'),$password,false);
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
