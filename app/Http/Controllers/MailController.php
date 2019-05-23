<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contact()
    {
      return view('emails.contact');
    }

    public function send(Request $request)
    {
      $rules = [
        'name' => ['required', 'max:32'],
        'email' => ['max:32', 'email'],
        'subject' => ['max:100'],
        'mail_message' => ['required', 'max:2000']
      ];

      $this->validate($request, $rules);

      $data = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'mail_message' => $request->mail_mesage
      ];

      //prvi parametar je template, drugi su podaci koje saljemo, treci je funkcija za prenos poruke
      Mail::send('emails.send', $data, function($message) {
        $message->to('pedja260@gmail.com', 'pedjatip2')->subject('Email poslat sa kontakt strane');
      });

      return redirect('/');
    }
}
