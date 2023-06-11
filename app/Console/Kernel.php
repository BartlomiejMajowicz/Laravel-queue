<?php

namespace App\Console;

use App\Jobs\CalculationJob;
use App\Events\QueueThresholdExceeded;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        Log::info('Scheduling work');
        for($i = 0; $i < 10; $i++) {
            $schedule->job(new CalculationJob())->everyMinute();
        }
        event(new QueueThresholdExceeded());
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
