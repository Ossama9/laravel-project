<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $post;
    public $message;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, Request $request)
    {
        $this->message = $request->message;
        $this->subject = $request->subject;
        $this->post = $post;
        $this->url = route('post', $post->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown(
            'emails-template',
            [
                'message' => $this->message,
                'post' => $this->post,
                'url'=>$this->url
            ]);
    }
}
