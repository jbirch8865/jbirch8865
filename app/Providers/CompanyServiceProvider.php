<?php

namespace App\Providers;

use app\Helpers\Company_Role;
use app\Helpers\Credit_Status;
use app\Helpers\Customer;
use app\Helpers\Employee;
use app\Helpers\Equipment;
use Illuminate\Support\ServiceProvider;
use \app\Helpers\People;
use app\Helpers\Tag;
use app\Helpers\Tags_Have_Role;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CompanyServiceProvider extends ServiceProvider
{
    private \Test_Tools\toolbelt $toolbelt;
    public function register()
    {
    }

    public function boot()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
        $this->helperfunctions = new \App\Providers\HelperServiceProvider(app());
        app()->bind('Create_Employee', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('first_name',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('first_name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('last_name',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('last_name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('email',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('email'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('title',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('title'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('description',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('description'));
            app()->request->validate([
                'email' => ['email'],
                ]);
            $employee = new Employee;
            return $employee;
        });
        app()->bind('Update_People', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('first_name',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('first_name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('last_name',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('last_name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('email',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('email'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('title',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('title'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('description',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('description'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('people',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('id'));
            app()->request->validate([
                'email' => ['email'],
                ]);
            $people = new People;
            $people->Load_Object_By_ID(app()->request->people);
            return $people;
        });
        app()->bind('Delete_People', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('people',$this->toolbelt->Use_Tables()->Get_Peoples()->Get_Column('id'));
            $people = new People;
            $people->Load_Object_By_ID(app()->request->people);
            return $people;
        });
        app()->bind('Create_Customer', function (){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('customer_name',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('customer_name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Int_Field_Required('credit_status',$this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_Column('id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('ccb',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('ccb'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('website',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('website'));
            $credit_status = new Credit_Status;
            $credit_status->Load_Object_By_ID(app()->request->input('credit_status'));
            $customer = new Customer;
            $customer->Set_Credit_Status($credit_status,false);
            return $customer;
        });
        app()->bind('Create_Customer_Address', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('description',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('description'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('city',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('city'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('state',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('state'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('name',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('street1',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('street1'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('street2',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('street2'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('zip',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('zip'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('lat',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('lat'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('lng',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('lng'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('url',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('url'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('google_id',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('google_id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('customer',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('id'));
            $customer_address = new \app\Helpers\Customer_Address;
            return $customer_address;
        });
        app()->bind('Create_Customer_Phone_Number', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('description',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('description'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('area_code',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('area_code'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('prefix',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('prefix'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('suffix',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('suffix'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('ext',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('ext'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('country_code',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('country_code'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('customer',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('id'));
            $customer_phone_number = new \app\Helpers\Customer_Phone_Number;
            return $customer_phone_number;
        });
        app()->bind('Update_Customer', function (){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('customer_name',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('customer_name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Int_Field('credit_status',$this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_Column('id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('ccb',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('ccb'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('website',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('website'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('customer',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('id'));
            $customer = new Customer;
            $customer->Load_Object_By_ID(app()->request->customer);
            if(app()->request->input('credit_status',false))
            {
                $credit_status = new Credit_Status;
                $credit_status->Load_Object_By_ID(app()->request->input('credit_status'));
                $customer->Set_Credit_Status($credit_status);
            }
            return $customer;
        });
        app()->bind('Delete_Customer', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('customer',$this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('id'));
            $customer = new Customer;
            $customer->Load_Object_By_ID(app()->request->customer);
            return $customer;
        });
        app()->bind('Create_Credit_Status', function (){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('name',$this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_Column('credit_status_name'));
            $credit_status = new Credit_Status;
            return $credit_status;
        });
        app()->bind('Update_Credit_Status', function (){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('creditstatus',$this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_Column('id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('name',$this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_Column('credit_status_name'));
            $credit_status = new Credit_Status;
            $credit_status->Load_Object_By_ID(app()->request->creditstatus);
            return $credit_status;
        });
        app()->bind('Delete_Credit_Status', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('creditstatus',$this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_Column('id'));
            $credit_status = new Credit_Status;
            $credit_status->Load_Object_By_ID(app()->request->creditstatus);
            return $credit_status;
        });
        app()->bind('Create_Equipment', function (){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('equipment_name',$this->toolbelt->Use_Tables()->Get_Equipments()->Get_Column('equipment_name'));
            $equipment = new Equipment;
            return $equipment;
        });
        app()->bind('Update_Equipment', function (){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('equipment',$this->toolbelt->Use_Tables()->Get_Equipments()->Get_Column('id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('equipment_name',$this->toolbelt->Use_Tables()->Get_Equipments()->Get_Column('equipment_name'));
            $equipment = new Equipment;
            $equipment->Load_Object_By_ID(app()->request->equipment);
            return $equipment;
        });
        app()->bind('Delete_Equipment', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('equipment',$this->toolbelt->Use_Tables()->Get_Equipments()->Get_Column('id'));
            $equipment = new Equipment;
            $equipment->Load_Object_By_ID(app()->request->equipment);
            return $equipment;
        });
        app()->bind('Update_Phone_Number', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('description',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('description'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('area_code',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('area_code'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('prefix',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('prefix'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('suffix',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('suffix'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('ext',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('ext'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('country_code',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('country_code'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('phonenumber',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('id'));
            $phone_number = new \app\Helpers\Phone_Number;
            $phone_number->Load_Object_By_ID(app()->request->phonenumber);
            return $phone_number;
        });
        app()->bind('Delete_Phone_Number', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('phonenumber',$this->toolbelt->Use_Tables()->Get_Phone_Numbers()->Get_Column('id'));
            $phone_number = new \app\Helpers\Phone_Number;
            $phone_number->Load_Object_By_ID(app()->request->phonenumber);
            return $phone_number;
        });
        app()->bind('Update_Address', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('description',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('description'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('city',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('city'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('state',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('state'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('name',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('street1',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('street1'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('street2',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('street2'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('zip',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('zip'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('lat',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('lat'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('lng',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('lng'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('url',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('url'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('google_id',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('google_id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('address',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('id'));
            $address = new \app\Helpers\Address;
            $address->Load_Object_By_ID(app()->request->address);
            return $address;
        });
        app()->bind('Delete_Address', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('address',$this->toolbelt->Use_Tables()->Get_Addresses()->Get_Column('id'));
            $address = new \app\Helpers\Address;
            $address->Load_Object_By_ID(app()->request->address);
            return $address;
        });
        app()->bind('Create_Tag', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('tag_name',$this->toolbelt->Use_Tables()->Get_Tags()->Get_Column('name'));
            $tag = new Tag;
            $tag->Set_Company($this->toolbelt->Get_Company(),false);
            return $tag;
        });
        app()->bind('Update_Tag', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('tag_name',$this->toolbelt->Use_Tables()->Get_Tags(false)->Get_Column('name'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('tag',$this->toolbelt->Use_Tables()->Get_Tags(false)->Get_Column('id'));
            $tag = new Tag;
            $tag->Load_Object_By_ID(app()->request->tag);
            return $tag;
        });
        app()->bind('Delete_Tag', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('tag',$this->toolbelt->Use_Tables()->Get_Tags(false)->Get_Column('id'));
            $tag = new Tag;
            $tag->Load_Object_By_ID(app()->request->tag);
            return $tag;
        });
        app()->bind('Create_Add_Tag', function($app,$parameters){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Int_Field_Required('addtag',$this->toolbelt->Use_Tables()->Get_Object_Tags($parameters['object'])->Get_Column('id'));
            $tag = new Tag;
            $tag->Load_Object_By_ID(app()->request->input('addtag'));
            return $tag;
        });
        app()->bind('Delete_Add_Tag', function($app,$parameters){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('addtag',$this->toolbelt->Use_Tables()->Get_Object_Has_Tags($parameters['object'])->Get_Column('tag_id'));
            $tag = new Tag;
            $tag->Load_Object_By_ID(app()->request->input('addtag'));
            return $tag;
         });
         app()->bind('Create_Tags_Have_Role', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Int_Field_Required('role',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('id'));
            $tag = new Tag;
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('tag',$this->toolbelt->Use_Tables()->Get_Object_Tags($tag)->Get_Column('id'));
            app()->request->validate([
                'get' => ['bool'],
                'post' => ['bool'],
                'destroy' => ['bool']
            ]);
            $tags_have_role = new Tags_Have_Role;
            return $tags_have_role;
        });
        app()->bind('Create_Tags_Have_Role', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Int_Field_Required('role',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('id'));
            $tag = new Tag;
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('tag',$this->toolbelt->Use_Tables()->Get_Object_Tags($tag)->Get_Column('id'));
            $tags_have_role = new Tags_Have_Role;
            $tag->Load_Object_By_ID(app()->request->tag);
            $role = new Company_Role;
            $role->Load_Object_By_ID(app()->request->input('role'));
            $tags_have_role->Set_Role($role,false);
            $tags_have_role->Set_Tag($tag);
            return $tags_have_role;
        });
        app()->bind('Delete_Tags_Have_Role', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('role',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('id'));
            $tag = new Tag;
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('tag',$this->toolbelt->Use_Tables()->Get_Object_Tags($tag)->Get_Column('id'));
            $tags_have_role = new Tags_Have_Role;
            $tag->Load_Object_By_ID(app()->request->tag);
            $role = new Company_Role;
            $role->Load_Object_By_ID(app()->request->role);
            $column1 = $this->toolbelt->Use_Tables()->Get_Tags_Have_Roles($tag)->Get_Column('tag_id');
            $column1->Set_Field_Value($tag->Get_Verified_ID());
            $column2 = $this->toolbelt->Use_Tables()->Get_Tags_Have_Roles($tag)->Get_Column('role_id');
            $column2->Set_Field_Value($role->Get_Verified_ID());
            $rule = new Validate_Value_Exists_In_Columns([$column1],$column2);
            if($rule->passes())
            {
                return $tags_have_role;
            }else
            {
                $this->toolbelt->Use_Functions()->Response_422(['message' => 'This tag doesn\'t have this role.'])->send();
                exit();
            }
        });
    }
}
