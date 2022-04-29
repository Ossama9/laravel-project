<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class StripController extends Controller
{
        public function initPayement(Request $request)
    {
        $post = Post::find($request->id);
        $amount = $post->price;
        $user = new User();
        return view('initpaiement', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function postPayement(Request $request)
    {


    }
}
