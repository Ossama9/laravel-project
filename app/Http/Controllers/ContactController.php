<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function contact(Request $request)
    {
        $post = Post::findOrFail($request->id);


        return view('contact', ['post' => $post]);
    }

    public function sendEmail(Request $request)
    {

        $post = Post::findOrFail($request->id_post);

        Mail::to($post->user->email)
            ->send(new SendMail($post, $request));

        return redirect(route('contact',$request->id_post));
    }
}
