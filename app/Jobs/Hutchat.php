<?php

namespace App\Jobs;

use App\Enums\Message;
use App\Models\Hutchat as Chat;
use App\Jobs\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Hutchat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $chat;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $chat = $this->chat;
        $bookhut = $chat->bookhut;
        $hutmates = $bookhut->hutmates;
        $user = user();

        foreach($hutmates as $mate){
            $mate = $mate->user;

            if(!$mate 
            ||  $mate->id == $user->id)
                continue;

            Notification::dispatch($mate, [
                'channel' => 'push',
                'title' => Message::build(
                    Message::HUTCHAT, [
                        'bookhut' => $bookhut->name
                    ]
                ),
                'message' => Message::build(Message::HUTCHAT_MESSAGE, [
                    'user' => $mate->fullname,
                    'message' => $chat->message
                ])
            ]);
        }

    }
}
