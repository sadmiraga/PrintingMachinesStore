<?php

namespace App\Http\Controllers;

use App\contactMail;
use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\machine;


class MailController extends Controller
{
    public function html_email(Request $request)
    {

        $machine = machine::find($request->input('machineID'));
        $machineName = $machine->name;

        $to_name = 'NezadKarijasevic';
        $to_email = $request->input('email');
        $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail", "machine" => $machine);
        Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Additional information about machine');
            $message->from('endzy2002@gmail.com', 'Additional information');
        });

        return redirect()->back()->with('message', 'You will receive email within few minutes with additional information');
    }

    public function addMail(Request $request)
    {
        $mail = new contactMail();
        $mail->email = $request->input('email');
        $mail->save();
        return redirect()->back();
    }
}
