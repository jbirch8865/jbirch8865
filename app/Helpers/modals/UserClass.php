<?php
class User extends \Authentication\User
{
    function __construct(string $unverified_username,string $unverified_password,int $company_id,bool $create_user = false,bool $only_if_active = true)
    {
        parent::__construct($unverified_username,$unverified_password,$company_id,$create_user,$only_if_active);
    }

    public function Get_Active_Status()
    {
        return $this->Is_Object_Active();
    }
}
?>