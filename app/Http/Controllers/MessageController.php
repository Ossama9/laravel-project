<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function dashboard($id,Request $request){
        $messages = Message::where('post_id',$id)->get();
        $notes = Note::where('post_id',$id)->get();
        $total = Note::where('post_id',$id)->sum('note');
        $count = count($notes);
        $resultat = $total/$count;
        return view('dashboard',['messages' => $messages, 'id' => $id,'count' => $count, 'resultat' => $resultat]);
    }

    public function postMessage(Request $request)
    {
        $message = new Message;
        $message->users_id = Auth::id();
        if ($request->message == NULL)
            return redirect(route('dashboard'));
        $message ->content = $request->message;
        $message ->post_id= $request->post_id;
        $message -> save();
        return redirect(route('dashboard'));
    }

}
