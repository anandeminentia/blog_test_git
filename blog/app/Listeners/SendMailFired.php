<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Book;
/*class SendMailFired*/
class SendMailFired implements ShouldQueue
{
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
       sleep(5);
       echo "In Event Listeners";
       /* $ObjBook = new Book();
        $ObjBook->title = "Event Book";
        $ObjBook->author = "anand".$event->userId;
        $ObjBook->publisher = "Anand Publication";
        $ObjBook->save();*/
        /*$user = User::find($event->userId)->toArray();

        Mail::send('emails.mailEvent', $user, function($message) use ($user) {

            $message->to($user['email']);

            $message->subject('Event Testing');

        });*/

    }
}
