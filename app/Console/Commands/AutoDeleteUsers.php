<?php

namespace App\Console\Commands;

use App\Http\Controllers\indexController;
use Illuminate\Console\Command;

class AutoDeleteUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-delete-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Delete User from Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Instantiate the indexController
        $controller = new indexController();

        // Call the autoDelete method
        $controller->autoDelete();
    }
}
