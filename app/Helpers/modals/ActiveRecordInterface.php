<?php
namespace app\Helpers;
interface iActiveRecord
{
    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    public function Get_API_Response_Collection() : array;
}

?>
