<?php

use App\Jobs\CalculationJob;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

uses(TestCase::class);

it('assert that CalculationJob can be dispatched to the queue', function () {
    Queue::fake();
    CalculationJob::dispatch();
    Queue::assertPushed(CalculationJob::class);
});
