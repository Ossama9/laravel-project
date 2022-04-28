<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Modele;
use App\Models\Modele as ModelAlias;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $idPost;

    public function createPost()
    {
        return view('createPost');
    }

    public function submitPost(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->brand_id = $request->brand;
        $post->modele_id = $request->model;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->save();
        $this->idPost = $post->id;
        $this->storeImage($request);

    }

    public function storeImage(Request $request)
    {

        $path = $request->file('image1')->store('public/image');
        $path = str_replace("public", "storage", $path);
        $name = $request->file('image1')->getClientOriginalName();
        $image = new Image();

//        $path = Storage::putFile('/', $request->file('image1'));


        $image->post_id = $this->idPost;
        $image->name = $name;
        $image->path = $path;

        $image->save();
    }

    public function posts()
    {
        $posts = Post::all();


        return view('posts', ["posts" => $posts]);
    }


}
