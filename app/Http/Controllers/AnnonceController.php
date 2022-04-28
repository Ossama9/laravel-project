<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function annonces(){
        $posts = Annonce::all();
        return view('annonces', ['post' => $posts]);
    }
}
