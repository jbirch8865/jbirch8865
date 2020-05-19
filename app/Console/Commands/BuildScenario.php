<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Test_Tools\Test_Cases;
use Test_Tools\Toolbelt;

class BuildScenario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test_case:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build the test case scenario';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $toolbelt = new Toolbelt;
        $toolbelt->test_cases->Build_Full_Scenario();
    }
}
