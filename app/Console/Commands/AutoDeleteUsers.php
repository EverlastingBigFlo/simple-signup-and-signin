<?php

namespace App\Console\Commands;

use App\Models\User;
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
        // Retrieve unconfirmed users created more than 1 minute ago
        $unconfirmedUsers = User::where('is_confirmed', false)
            ->where('created_at', '<=', now()->subMinutes(1))
            ->get();

        // Delete unconfirmed users
        foreach ($unconfirmedUsers as $user) {
            $user->delete();
        }

        // Output information about the operation
        $this->info('Unconfirmed users deleted: ' . count($unconfirmedUsers));
    }
}
