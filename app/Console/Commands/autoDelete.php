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
    // Retrieve email from session
    // $email = session()->get('email');
    // Retrieve token creation time from session
    $tokenCreatedAt = session()->get('created_at');

    // Check if token expiration time has passed (1 minute in this case)
    $tokenExpirationTime = $tokenCreatedAt->addMinutes(1);

    if (now() > $tokenExpirationTime) {
        // Token has expired, log an error message
        $this->error('Token has expired. Please sign up again.');
        
        // You can also perform additional actions here if needed
        
        // Clear session data (optional)
        session()->forget('email');
    }
}

}
