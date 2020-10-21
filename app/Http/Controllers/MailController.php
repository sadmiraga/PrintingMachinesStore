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
        Mail::to('sadmirvela@gmail.com')->send(new TestMail());
    }
}
