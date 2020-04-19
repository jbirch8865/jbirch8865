<?php
namespace app\Helpers;


/**
     *
     */

class Program extends \API\Program implements iActiveRecord
{
    function __construct()
    {
        parent::__construct();
    }
    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    function Get_API_Response_Collection(): array
    {
        return $this->Get_Response_Collection(app()->request->input('include_details',0),app()->request->input('details_offset',0),app()->request->input('details_limit',1));
    }
    public function Delete_Active_Record() : void
    {
        app()->request->validate([
            'active_status' => ['required','bool']
        ]);

    }

}

?>