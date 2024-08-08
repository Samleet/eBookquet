<?php

namespace App\Jobs;

use App\Enums\Message;
use App\Jobs\Notification;
use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Payment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $rental;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $rental = $this->rental;
        $book = $rental->book;
        $publisher = $book->publisher; ////////////////////////////
        $wallet = $publisher->wallet;
        $duration = carbon()
            ->parse($rental->lease_time)
            ->diffInDays(now()) ?? 1;

        $wallet->update([

            'balance' => $wallet->balance + (float)$rental->amount

        ]);

        Notification::dispatch($publisher, [
            'channel' => null,
            'title' => Message::build(
                Message::PAYMENT, [
                    'amount' => $rental->amount
                ]
            ),
            'message' => Message::build(Message::PAYMENT_MESSAGE, [
                'user' => user()->fullname,
                'book' => $book->title,
                'amount' => $rental->amount,
                'renters' => $rental->readers,
                'duration' => $duration,
            ])
        ]);

    }
}
