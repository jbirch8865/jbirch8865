<?php
namespace app\Helpers;

class User extends \Authentication\User
{
    function __construct(string $unverified_username,string $unverified_password,\Company\Company $company,bool $create_user = false,bool $only_if_active = true)
    {
        parent::__construct($unverified_username,$unverified_password,$company,$create_user,$only_if_active);
    }

    public function Get_Active_Status()
    {
        return $this->Is_Object_Active();
    }
}
?>