<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CalculationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('CalculationJob started');
        $this->performCalculations();
    }

    private function performCalculations()
    {
        $numberOfSeconds = 10;
        $endTime = time() + $numberOfSeconds;
        while (time() < $endTime) {
            usleep(1000); // Sleep for 1 millisecond
        }
        Log::info('CalculationJob finished');
    }
}
