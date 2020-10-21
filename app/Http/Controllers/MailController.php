<?php

namespace App\Http\Controllers;

use App\contactMail;
use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function html_email()
    {
        //Mail::to('endzy2002@gmail.com')->send(new testMail());
        Mail::mailer('mailgun')->to('endzy2002@gmail.com')->send(new testMail());
        return 'done';
    }

    public function addMail(Request $request)
    {

        $contactMail = new contactMail();
        $contactMail->email = $request->input('email');
        $contactMail->save();
        return redirect()->back();
    }
}
