<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Carbon\Carbon;

class EmailController extends Controller
{
    public function sendEmail(){
        $emailJob = (new SendMailJob())->delay(Carbon::now()->addSeconds(15));
        dispatch($emailJob);
        return 'email sent';
    }
}
