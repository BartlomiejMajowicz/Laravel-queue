<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\QueueThresholdExceededNotification;
use Illuminate\Support\Facades\Queue;

class CheckQueueThreshold
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $queueSize = Queue::size();
        if ($queueSize > env('QUEUE_THRESHOLD')) {
            $user = User::first();
            $user->notify(new QueueThresholdExceededNotification($queueSize));
        }
    }
}
