<?php

namespace App\Listeners;


use App\Mail\NewCommentCreated as NewCommentCreatedMail;
use App\Events\NewCommentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class SendNewCommentNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewCommentCreated $event)
    {
        Mail::to($event->article->user->email)->send(
        new NewCommentCreatedMail($event->article));
    }
}
