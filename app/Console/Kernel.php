<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Your existing commands...
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        try {
            // Load the commands directory
            $this->load(__DIR__.'/Commands');

            // $schedule->command('optimize:clear')->everyThirtyMinutes();
            $schedule->command('optimize:clear')->everyTenSeconds()->withoutOverlapping();
            Log::info('Task executed successfully.');
        } catch (\Exception $e) {
            Log::error('An error occurred during task execution: ' . $e->getMessage());
            // You can also log the exception for further analysis
            Log::error('Error in your:custom-command: ' . $e->getMessage());
        } 
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
