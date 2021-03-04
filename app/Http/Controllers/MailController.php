<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Subcriber;

class MailController extends Controller
{
    public function send()
    {
        $subs = Subcriber::all();

        foreach ($subs as $sub) {
            $mail = $sub->email;
            $sendMailJob = new SendMail($mail);
            SendMail::dispatch($sendMailJob);
        }
        toast(trans('success'), trans('sent_mail'));

        return redirect()->back();
    }
}
