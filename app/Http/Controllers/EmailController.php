<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSubscriptionEmail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        Mail::to($email)->send(new SendSubscriptionEmail());

        return redirect()->back()->with('message', 'Email sent successfully!');
    }
}
