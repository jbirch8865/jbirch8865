<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{

    public function register()
    {
        // Construct the iterator
        $it = new \RecursiveDirectoryIterator(app_path('Helpers'));

        // Loop through files
        foreach(new \RecursiveIteratorIterator($it) as $file) {
            if ($file->getExtension() == 'php') {
                require_once $file;
            }
        }
        app()->singleton('toolbelt',function(){
            return new \toolbelt;
        });
    }
    public function boot()
    {
        app()->singleton('Program',function(){
            return new \API\Program();
        });
    }
}
