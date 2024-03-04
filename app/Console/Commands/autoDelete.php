<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();

        User::table('email')
            ->where('is_confirmed', '=', false)
            ->where('created_at', '<', $now->subMinutes(1))
            ->delete();

        Log::info('Expired reservations deleted successfully');
    }
}
