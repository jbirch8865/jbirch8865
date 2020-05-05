<?php

namespace App\Providers;

use app\Helpers\Credit_Status;
use app\Helpers\Customer;
use app\Helpers\Employee;
use app\Helpers\Equipment;
use App\Rules\Validate_Unique_Value_In_Columns;
use App\Rules\Validate_Value_Exists_In_Column;
use Illuminate\Support\ServiceProvider;
use \app\Helpers\People;
use App\Rules\Does_This_Exist_In_Context;

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
            $this->helperfunctions->Validate_Post_Field_Required('first_name',$this->toolbelt->Get_Peoples()->Get_Column('first_name'));
            $this->helperfunctions->Validate_Post_Field_Required('last_name',$this->toolbelt->Get_Peoples()->Get_Column('last_name'));
            $this->helperfunctions->Validate_Post_Field('email',$this->toolbelt->Get_Peoples()->Get_Column('email'));
            $this->helperfunctions->Validate_Post_Field('title',$this->toolbelt->Get_Peoples()->Get_Column('title'));
            $this->helperfunctions->Validate_Post_Field('description',$this->toolbelt->Get_Peoples()->Get_Column('description'));
            app()->request->validate([
                'email' => ['email'],
                ]);
            $employee = new Employee;
            return $employee;
        });
        app()->bind('Update_People', function(){
            $this->helperfunctions->Validate_Post_Field('first_name',$this->toolbelt->Get_Peoples()->Get_Column('first_name'));
            $this->helperfunctions->Validate_Post_Field('last_name',$this->toolbelt->Get_Peoples()->Get_Column('last_name'));
            $this->helperfunctions->Validate_Post_Field('email',$this->toolbelt->Get_Peoples()->Get_Column('email'));
            $this->helperfunctions->Validate_Post_Field('title',$this->toolbelt->Get_Peoples()->Get_Column('title'));
            $this->helperfunctions->Validate_Post_Field('description',$this->toolbelt->Get_Peoples()->Get_Column('description'));
            $this->helperfunctions->Validate_Uri_Int_Parameter('people',$this->toolbelt->Get_Peoples()->Get_Column('id'));
            app()->request->validate([
                'email' => ['email'],
                ]);
            $people = new People;
            $people->Load_Object_By_ID(app()->request->people);
            return $people;
        });
        app()->bind('Delete_People', function(){
            $this->helperfunctions->Validate_Uri_Int_Parameter('people',$this->toolbelt->Get_Peoples()->Get_Column('id'));

            $people = new People;
            $people->Load_Object_By_ID(app()->request->people);
            return $people;
         });

        app()->bind('Create_Customer', function (){
            $this->helperfunctions->Validate_Post_Field_Required('customer_name',$this->toolbelt->Get_Customers()->Get_Column('customer_name'));
            $this->helperfunctions->Validate_Post_Int_Field_Required('credit_status',$this->toolbelt->Get_Credit_Statuses()->Get_Column('id'));
            $this->helperfunctions->Validate_Post_Field('ccb',$this->toolbelt->Get_Customers()->Get_Column('ccb'));
            $this->helperfunctions->Validate_Post_Field('website',$this->toolbelt->Get_Customers()->Get_Column('website'));
            $customer = new Customer;
            return $customer;
        });
        app()->bind('Update_Customer', function (){
            $this->helperfunctions->Validate_Post_Field('customer_name',$this->toolbelt->Get_Customers()->Get_Column('customer_name'));
            $this->helperfunctions->Validate_Post_Int_Field('credit_status',$this->toolbelt->Get_Credit_Statuses()->Get_Column('id'));
            $this->helperfunctions->Validate_Post_Field('ccb',$this->toolbelt->Get_Customers()->Get_Column('ccb'));
            $this->helperfunctions->Validate_Post_Field('website',$this->toolbelt->Get_Customers()->Get_Column('website'));
            $this->helperfunctions->Validate_Uri_Int_Parameter('customer',$this->toolbelt->Get_Customers()->Get_Column('id'));

            $customer = new Customer;
            $customer->Load_Object_By_ID(app()->request->customer);
            return $customer;
        });
        app()->bind('Delete_Customer', function(){
            $this->helperfunctions->Validate_Uri_Int_Parameter('customer',$this->toolbelt->Get_Customers()->Get_Column('id'));
            $customer = new Customer;
            $customer->Load_Object_By_ID(app()->request->customer);
            return $customer;
         });
         app()->bind('Create_Credit_Status', function (){
            $this->helperfunctions->Validate_Post_Field_Required('name',$this->toolbelt->Get_Credit_Statuses()->Get_Column('credit_status_name'));
            $credit_status = new Credit_Status;
            return $credit_status;
        });
        app()->bind('Update_Credit_Status', function (){
            $this->helperfunctions->Validate_Uri_Int_Parameter('credit_status',$this->toolbelt->Get_Credit_Statuses()->Get_Column('id'));
            $this->helperfunctions->Validate_Post_Field('name',$this->toolbelt->Get_Credit_Statuses()->Get_Column('credit_status_name'));
            $credit_status = new Credit_Status;
            $credit_status->Load_Object_By_ID(app()->request->credit_status);
            return $credit_status;
        });
        app()->bind('Delete_Credit_Status', function(){
            $this->helperfunctions->Validate_Uri_Int_Parameter('credit_status',$this->toolbelt->Get_Credit_Statuses()->Get_Column('id'));
            $credit_status = new Credit_Status;
            $credit_status->Load_Object_By_ID(app()->request->credit_status);
            return $credit_status;
         });
         app()->bind('Create_Equipment', function (){
            $this->helperfunctions->Validate_Post_Field_Required('equipment_name',$this->toolbelt->Get_Equipments()->Get_Column('equipment_name'));
            $equipment = new Equipment;
            return $equipment;
        });
        app()->bind('Update_Equipment', function (){
            $this->helperfunctions->Validate_Uri_Int_Parameter('equipment',$this->toolbelt->Get_Equipments()->Get_Column('id'));
            $this->helperfunctions->Validate_Post_Field('equipment_name',$this->toolbelt->Get_Equipments()->Get_Column('equipment_name'));
            $equipment = new Equipment;
            $equipment->Load_Object_By_ID(app()->request->equipment);
            return $equipment;
        });
        app()->bind('Delete_Equipment', function(){
            $this->helperfunctions->Validate_Uri_Int_Parameter('equipment',$this->toolbelt->Get_Equipments()->Get_Column('id'));
            $equipment = new Equipment;
            $equipment->Load_Object_By_ID(app()->request->equipment);
            return $equipment;
         });
         app()->bind('Create_Customer_Address', function(){
            $this->helperfunctions->Validate_Post_Field_Required('description',$this->toolbelt->Get_Addresses()->Get_Column('description'));
            $this->helperfunctions->Validate_Post_Field_Required('city',$this->toolbelt->Get_Addresses()->Get_Column('city'));
            $this->helperfunctions->Validate_Post_Field_Required('state',$this->toolbelt->Get_Addresses()->Get_Column('state'));
            $this->helperfunctions->Validate_Post_Field('name',$this->toolbelt->Get_Addresses()->Get_Column('name'));
            $this->helperfunctions->Validate_Post_Field('street1',$this->toolbelt->Get_Addresses()->Get_Column('street1'));
            $this->helperfunctions->Validate_Post_Field('street2',$this->toolbelt->Get_Addresses()->Get_Column('street2'));
            $this->helperfunctions->Validate_Post_Field('zip',$this->toolbelt->Get_Addresses()->Get_Column('zip'));
            $this->helperfunctions->Validate_Post_Field('lat',$this->toolbelt->Get_Addresses()->Get_Column('lat'));
            $this->helperfunctions->Validate_Post_Field('lng',$this->toolbelt->Get_Addresses()->Get_Column('lng'));
            $this->helperfunctions->Validate_Post_Field('url',$this->toolbelt->Get_Addresses()->Get_Column('url'));
            $this->helperfunctions->Validate_Post_Field('google_id',$this->toolbelt->Get_Addresses()->Get_Column('google_id'));
            $customer_address = new \app\Helpers\Customer_Address;
            return $customer_address;
        });
        app()->bind('Update_Address', function(){
            $this->helperfunctions->Validate_Post_Field('description',$this->toolbelt->Get_Addresses()->Get_Column('description'));
            $this->helperfunctions->Validate_Post_Field('city',$this->toolbelt->Get_Addresses()->Get_Column('city'));
            $this->helperfunctions->Validate_Post_Field('state',$this->toolbelt->Get_Addresses()->Get_Column('state'));
            $this->helperfunctions->Validate_Post_Field('name',$this->toolbelt->Get_Addresses()->Get_Column('name'));
            $this->helperfunctions->Validate_Post_Field('street1',$this->toolbelt->Get_Addresses()->Get_Column('street1'));
            $this->helperfunctions->Validate_Post_Field('street2',$this->toolbelt->Get_Addresses()->Get_Column('street2'));
            $this->helperfunctions->Validate_Post_Field('zip',$this->toolbelt->Get_Addresses()->Get_Column('zip'));
            $this->helperfunctions->Validate_Post_Field('lat',$this->toolbelt->Get_Addresses()->Get_Column('lat'));
            $this->helperfunctions->Validate_Post_Field('lng',$this->toolbelt->Get_Addresses()->Get_Column('lng'));
            $this->helperfunctions->Validate_Post_Field('url',$this->toolbelt->Get_Addresses()->Get_Column('url'));
            $this->helperfunctions->Validate_Post_Field('google_id',$this->toolbelt->Get_Addresses()->Get_Column('google_id'));
            $this->helperfunctions->Validate_Uri_Int_Parameter('address',$this->toolbelt->Get_Addresses()->Get_Column('id'));
            $address = new \app\Helpers\Address;
            $address->Load_Object_By_ID(app()->request->address);
            return $address;
        });
        app()->bind('Delete_Address', function(){
            $this->helperfunctions->Validate_Uri_Int_Parameter('address',$this->toolbelt->Get_Addresses()->Get_Column('id'));
            $address = new \app\Helpers\Address;
            $address->Load_Object_By_ID(app()->request->address);
            return $address;
         });



    }
}
