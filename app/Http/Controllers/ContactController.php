<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request) {
        $v = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:5000',
        ]);
        dd($v);
        return json_encode($request->message);
    }
}
