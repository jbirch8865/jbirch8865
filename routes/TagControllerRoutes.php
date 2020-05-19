<?php
use Illuminate\Support\Facades\Route;

// Work with Object Tags NOT Assigning tags
Route::resource('/tags/addtags', 'TagController',[
    'only' => ['store','index'],
    'names' => [
        'index' => 'List_Tag_Tags',
        'store' => 'Create_Tag_Tag'
    ]
])->middleware(['company_access_token']);

Route::resource('/customers/addtags', 'CustomerTagController',[
    'only' => ['store','index'],
    'names' => [
        'index' => 'List_Customer_Tags',
        'store' => 'Create_Customer_Tag'
    ]
])->middleware(['company_access_token']);

// Adding Roles to Tags for other tag resources only.  Cannot add roles to tags for other resources.
Route::resource('tags/{tag}/roles', 'TagRoleController',[
    'only' => ['store','index'],
    'names' => [
        'store' => 'Add_Role_To_Tag',
        'index' => 'List_Roles_On_Tag'
    ]
])->middleware(['company_access_token']);

//Assign tags to objects | TAGS are already created
Route::resource('tags/{tag}/addtags', 'AddTagToTagController',[
    'only' => ['store','index'],
    'names' => [
        'store' => 'Add_Tag_To_Tag',
        'index' => 'List_Tags_On_Tag',
    ]
])->middleware(['company_access_token']);

Route::resource('customers/{customer}/addtags', 'AddTagToCustomerController',[
    'only' => ['store','index','destroy'],
    'names' => [
        'store' => 'Add_Tag_To_Customer',
        'index' => 'List_Tags_On_Customer',
        'destroy' => 'Remove_Tag_From_Customer'
    ]
]);

//Remove Tags from other Tags | All other object tags are removed above\
Route::resource('tags/{tag}/addtags', 'AddTagToTagController',[
    'only' => ['destroy'],
    'names' => [
        'destroy' => 'Remove_Tag_From_Tag',
    ]
])->middleware(['company_access_token']);

//Remove Role from Tag
Route::resource('tags/{tag}/roles', 'TagRoleController',[
    'only' => ['destroy'],
    'names' => [
        'destroy' => 'Remove_Role_From_Tag'
    ]
])->middleware(['company_access_token']);

//Delete Tags
Route::resource('/tags', 'TagController',[
    'only' => ['update','destroy'],
    'names' => [
        'update' => 'Update_Tag',
        'destroy' => 'Delete_Tag'
    ]
])->middleware(['company_access_token']);
