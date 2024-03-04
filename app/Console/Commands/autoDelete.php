<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class autoDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-Delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically delete expired records from the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    }
}
