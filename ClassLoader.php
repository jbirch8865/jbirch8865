<?php
define('LARAVEL_START', microtime(true));
require 'vendor/autoload.php';
$cConfig = new \config\ConfigurationFile;
$cConfigs->Set_Entry_Point_Php_Unit();
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$kernel->terminate($request, $response);
