<?php

namespace App\Console\Commands;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('sarahdarwich227@gmail.com')->send(new SendEmail);
    }
}
