<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('image');
    }

    public function save(Request $request)
    {
            $file= $request->file('image');
            $name = $file->getClientOriginalName();
            $path = $file->store('public/images');
            $save = new Photo();
            $save->name = $name;
            $save->path = $path;
            $save->save();

        return redirect('upload-image')->with('status', 'Image Has been uploaded');
    }
}
