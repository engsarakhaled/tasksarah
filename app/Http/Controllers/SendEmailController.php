<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendEmailJob;

class SendEmailController extends Controller
{
    public function sendemails()
    {
        $emails = User::get();

        foreach ($emails as $user) {
            dispatch(new SendEmailJob($user));
            //dd($user);
        }
        return "Emails will be sent in the background";
    }
}
 

