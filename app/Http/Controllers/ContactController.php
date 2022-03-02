<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request) {
        $v = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:5000',
        ]);
        Mail::to('manuvai.rehua@gmail.com')->send(new ContactMessageMail([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]));
        
        return json_encode($request->message);
    }
}
