<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function postNote(Request $request)
    {
        $note = new Note;
        $note->note = $request->note;
        $note->post_id= $request->post_id;
        $note -> save();
        return redirect(route('post', $request->post_id))->with('success','Note créé avec succés');
    }

}
