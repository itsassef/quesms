<?php

namespace App\Jobs;

use App\Http\Controllers\MessageController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Twilio\Rest\Client;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;
    protected $number;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $message, string $number)
    {
        $this->message = $message;
        $this->number = $number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sid    = env('TWILIO_SID');
        $token  = env('TWILIO_TOKEN');
        $client = new Client($sid, $token);

        $client->messages->create(
            $this->number,
            [
                'from' => env('TWILIO_FROM'),
                'body' => $this->message,
            ]
        );
    }
}
