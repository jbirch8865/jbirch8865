<?php

namespace App\Providers;

use app\Helpers\Employee;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    private \Test_Tools\toolbelt $toolbelt;
    private \App\Providers\HelperServiceProvider $helperfunctions;
    public function register()
    {
    }

    public function boot()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
        $this->helperfunctions = new \App\Providers\HelperServiceProvider(app());


        app()->bind('Create_Employee', function(){
            $this->helperfunctions->Validate_Post_Field_Required('first_name',$this->toolbelt->People->Get_Column('first_name'));
            $this->helperfunctions->Validate_Post_Field_Required('last_name',$this->toolbelt->People->Get_Column('last_name'));
            $this->helperfunctions->Validate_Post_Field('email',$this->toolbelt->People->Get_Column('email'));
            $this->helperfunctions->Validate_Post_Field('title',$this->toolbelt->People->Get_Column('title'));
            $this->helperfunctions->Validate_Post_Field('description',$this->toolbelt->People->Get_Column('description'));
            app()->request->validate([
                'email' => ['email'],
                ]);
            $employee = new Employee;
            return $employee;
        });
        app()->bind('Update_Employee', function(){
            $this->helperfunctions->Validate_Post_Field('first_name',$this->toolbelt->People->Get_Column('first_name'));
            $this->helperfunctions->Validate_Post_Field('last_name',$this->toolbelt->People->Get_Column('last_name'));
            $this->helperfunctions->Validate_Post_Field('email',$this->toolbelt->People->Get_Column('email'));
            $this->helperfunctions->Validate_Post_Field('title',$this->toolbelt->People->Get_Column('title'));
            $this->helperfunctions->Validate_Post_Field('description',$this->toolbelt->People->Get_Column('description'));
            $this->helperfunctions->Validate_Uri_Int_Parameter('employee');
            app()->request->validate([
                'email' => ['email'],
                ]);
            $columns = [];
            $employee = new Employee;
            $employee->Load_Object_By_ID(app()->request->employee);
            return $employee;
        });
        app()->bind('Delete_Employee', function(){
            $this->helperfunctions->Validate_Uri_Int_Parameter('employee');
            $employee = new Employee;
            $employee->Load_Object_By_ID(app()->request->employee);
            return $employee;
         });
    }
}
