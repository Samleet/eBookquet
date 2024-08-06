<?php

namespace App\Jobs;

use App\Contracts\MailContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Mailer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    public function __construct($data)
    {
        $this->data = $data;

        $this->onQueue("default");
        $this->delay(now()->addSeconds(3));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MailContract $mail)
    {
        $subject = isset($this->data['title'])?$this->data['title'] 
        : substr($this->data['message'], 0, 100);
        
        $mail::send('message', [
            'subject' => 
                   str_replace('%app%',config('app.name'),$subject),
            'content' => $this->data['message'],
            'user' => $this->data['user'],
            'email' => $this->data['email'],

            ////////////////////////////////////////////////////////
        ]);

    }
}
