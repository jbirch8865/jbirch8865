<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/sdlc', function () {
    $steps = [
        'Requirement Collection' =>
            [
                'Incoming Request',
                'Performance, Security, and App Review',
                'Maintenance Review'
            ],
        'Designing' =>
            [
                'Receive Incoming New Process',
                'Break up process and prototype steps',
                'Write Code',
                'Secure Code',
                'Document Code',
                'Test Code',
                'Review Code',
                'Deploy to first environment'
            ],
        'Testing' =>
            [
                'QA the new process',
                'Review Documentation',
                'Attack Process',
                'Deploy to Second Envrionment'
            ],
        'Deployment' =>
            [
                'Deploy to Production'
            ]
    ];
    return view('sdlc',compact('steps'));
});

Route::get('sdlc/writecode', function () {
    $steps = [
        'New_Resource' =>
        [
            '{Database_Schema}',
            '{Data_Modals}',
            '{Providers}',
            '{Routes}',
            '{Controllers}',
            '{Strategies}'
        ],
        'Database_Schema' =>
        [
            'New_Resource' =>
            [
                'Add_DB_Table' =>
                [
                    'When creating a new table if the table represents a resource make sure to include the company_id for security purposes.',
                    'create table file - table name MUST not be singular name of resource ex. Equipment <-- resource name Equipments <-- table name',
                    'add constraints',
                    'add multi column unique index',
                    'required in loader file',
                    '{Toolbelt}'
                ],
            ],
            'next_task' =>
            [

            ]
        ],
        'Toolbelt' =>
        [
            'Modify_Toolbelt' =>
            [
                'Toolbelt_Base - located in php_tools/TestClass.php' =>
                [
                    'Add_DB_Table' =>
                    [
                        'declare public table, variable name must match database table name, caps sensative',
                        'go add instantiation of new variable in the php_tools/PostClassLoader.php'
                    ],
                    'Create_New_Modal' =>
                    [
                        'declare public active record class, variable name must match active record class name, caps sensative',
                        'add Get_Class and Null_Class',
                        'Register Null_Class in Null_All()'
                    ]
                ],
                'Toolbelt - located in php_tools/TestClass.php' =>
                [
                    'Add_DB_Table' =>
                    [
                        'declare public table, variable name must match database table name, caps sensative',
                        'instantiate new variable in constructor',
                        'Create Get_Table_Name function and add any mandatory SELECT logic',
                    ],
                    'Create_New_Modal' =>
                    [
                        'add Get_Class'
                    ]
                ]
            ],
            'next_task' =>
            [

            ]
        ],
        'Data_Modals' =>
        [
            'New_Resource' =>
            [
                'Create_New_Modal' =>
                [
                    'Copy closest active record modal',
                    'treat any linking tables required as their own unique data modal',
                    'register surrounding relationships, there is a function called Do_I_Have_Any_Inactive_Required_Relationships, if the modal you are working on fits this bill then set the required_to_be_active equal to true if not set it to false.  This is required for linking tables as well.',
                    'go to surrounding modals and add reverse relationships, there is a function called Do_I_Have_Any_Inactive_Required_Relationships, if the modal you are working on fits this bill then set the required_to_be_active equal to true if not set it to false.  This is required for linking tables as well.',
                    'require in loader file',
                    '{Providers}'
                ]
            ]
        ],
        'Providers' =>
        [
            'New_Resource' =>
            [
                'Create_New_Modal' =>
                [
                    'Add Bind for new modal, naming conventions are Create_ActiveRecordClassName,Update_ActiveRecordClassName,Delete_ActiveRecordClassName',
                    'Validate ALL CRUD in new binds',
                    '{Toolbelt}'
                ]
            ]
        ],
        'Routes' =>
        [
            'New_Resource' =>
            [
                'Create_New_Route' =>
                [
                    'Think of any helpful/required new middleware',
                    'register existing needed middleware',
                    'Go register route in php_tools/Deployment_Scripts/3Post_Scripts.php'
                ]
            ]
        ],
        'Controllers' =>
        [
            'New_Resource' =>
            [
                'Build_New_Controller' =>
                [
                    'index' =>
                    [
                        'Make sure to use the toolbelt table Get_All_Objects()'
                    ],
                    'update' =>
                    [
                        'add Enable_Disabled_Object if appropriate'
                    ],
                    'delete' =>
                    [

                    ]
                ]
            ]
        ],
        'Strategies' =>
        [
            'New_Resource' =>
            [
                'URI' =>
                [
                    'Add global documentation variable on a newly created resource.',
                    'add uri parameter using the new global variable to be used during auto document generating'
                ],
                'POST' =>
                [
                    'Add all required and non required post data so that documentation shows optional params'
                ],
                'Query' =>
                [
                    'Add any new query param options not previously demenstrated'
                ]
            ]
        ]

    ];
    return view('sdlc',compact('steps'));
});
