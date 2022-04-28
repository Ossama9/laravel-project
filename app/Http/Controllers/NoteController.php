<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /*public function dashboard($id,Request $request){
        $messages = Note::where('post_id',$id)->get();
        return view('dashboard',['notes' => $notes]);
    }*/

    public function postNote(Request $request)
    {
        $note = new Note;
        $note->note = $request->note;
        $note->post_id= $request->post_id;
        $note -> save();
        return redirect(route('dashboard'));
    }

    public function countNote(Request $request)
    {
        //$note = new Note;
        $note= Note::where('post_id', $request->post_id);
        return view('dashboard',['note' => $note]);
    }

}
