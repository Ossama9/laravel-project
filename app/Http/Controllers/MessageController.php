<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function postMessage(Request $request)
    {
        $message = new Message;
        $message->post_id = $request->post_id;
        $message->user_id = Auth::id();
        $message->content = $request->message;
        $message->save();
        return redirect(route('post', $request->post_id));
    }

}
