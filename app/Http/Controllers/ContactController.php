<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request)
    {
        Mail::to('azizulhaque4198@gmail.com')->send(new ContactMail($request->name, $request->email, $request->body));
        return redirect()->route('welcome')->with('success', 'Your message has been sent successfully.');
    }
}
