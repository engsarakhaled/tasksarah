<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

//https://www.luckymedia.dev/blog/laravel-for-beginners-using-queues

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    public $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
      
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (isset($this->user->email)) { // Check if email exists
            Mail::to($this->user->email)
                ->send(new WelcomeUserEmail($this->user));
        } else {
            // Handle the case where user doesn't have an email
            // You can log an error or skip sending the email
            \Log::warning('User ' . $this->user->id . ' does not have an email address');
        }
    }
}
