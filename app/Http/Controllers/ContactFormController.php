<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        // Here you will handle the form submission, like validating input and sending emails.
        $messages = [
            'name.required' => 'We need to know your name!',
            'email.required' => 'Do not forget your email address!',
            'email.email' => 'Please provide a valid email address.',
            'message.required' => 'A message is required to submit the form.',
        ];

        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ], $messages);

        // Capture the data
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $message = $request->input('message');

        // Process the data (e.g., validation, sending email)
        Mail::to('komsan_aia@utcc.ac.th')->send(new ContactMail($validated));

        session()->flash('success', 'Thank you for your message!');

        return back();
    }
}
