<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function mail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }
        $sendResponse = Notification::send(User::first(), new ContactMessage($request->email, $request->name, $request->message));
        if (!$sendResponse) {
            return response()->json([
                'status' => 200,
            ]);
        }
        return response()->json($sendResponse);
    }
}
