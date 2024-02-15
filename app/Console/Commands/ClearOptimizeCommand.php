<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearOptimizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-optimize-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing optimized files...');
        $this->call('optimize:clear');
        $this->info('Optimized files cleared successfully.');
    }
}
