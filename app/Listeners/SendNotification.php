<?php

namespace App\Listeners;

use App\Events\StoryCreated;
use App\Mail\NewStoryNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StoryCreated  $event
     * @return void
     */
    public function handle(StoryCreated $event)
    {
        Mail::send(new NewStoryNotification($event->title));
    }
}
