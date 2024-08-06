<?php

namespace App\Jobs;

use App\Jobs\Mailer;
use App\Services\FirebaseService;
use App\Contracts\MailContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Notification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var user
     */
    private $user;

    /**
     * @var data
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @param User $upline
     * @param commission $commission
     * @return void
     */
    public function __construct($user, $data)
    {
        $this->user = $user;
        $this->data = $data;

        $this->onQueue("default");
        $this->delay(now()->addSeconds(3));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $data = $this->data;
        $channel = $this->data['channel'];

        if($channel == 'push'){
            $firebase = new FirebaseService(); //bootstraping firebase 
            if(!$user->device_id) return ;


            $firebase->sendNotification([
                'token' => $user->device_id,
                'title' => $data['title'],
                'message' => $data['message']
            ]);
        }

        if($channel == 'mail'){
            $template = $data[ 'template' ];
            $mailer = (new MailContract)->send($template, array_merge(
                array (
                'email' => $user->email,
                'subject' => $data['title'],
                ),
                (array) $data['data'] ?? []
            ));
        }

        if(isset($data ['message']) == (true) 
        && !array_key_exists(
            'log', @ $data['data']  ?? [   ])
        )
        $user->notifications()->create(array(
            'title' => $data['title'],
            'message' => $data['message'] //logging in-app notification
        ));

    }
}
