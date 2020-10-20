<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function html_email()
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function ($message) {
            $message->to('sadmiredward@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
            $message->from('reufvela@gmail.com', 'Nezad Karijasevic');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
}
