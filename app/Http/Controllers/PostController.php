<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Message;
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
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image1' => 'required'
        ]);

        if ($request->has('idPost')) {
            $this->idPost = $request->idPost;

            $post = Post::findOrFail($this->idPost);
            if ($post->user_id = !Auth::id())
                abort(404);
            $post->user_id = Auth::id();
            $post->brand_id = $request->brand;
            $post->modele_id = $request->model;
            $post->description = $request->description;
            $post->price = $request->price;
            $post->save();

            $images = $post->images;
            foreach ($images as $image) {
                $image->delete();
            }
            for ($i = 1; $i < 6; $i++) {
                if ($request->has('image' . $i))
                    $this->storeImage($request->file('image' . $i));

            }

            return redirect(route('posts'))->with('info','votre annonce est mis à jour avec succés');

        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->brand_id = $request->brand;
        $post->modele_id = $request->model;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->save();
        $this->idPost = $post->id;

        for ($i = 1; $i < 6; $i++) {
            if ($request->has('image' . $i))
                $this->storeImage($request->file('image' . $i));


        }
        return redirect(route('posts'))->with('success','Annonce créé avec succés');


//        $this->storeImage($request);

    }

    public function storeImage($picture)
    {


        $path = $picture->store('public/image');
        $path = str_replace("public", "storage", $path);
        $name = $picture->getClientOriginalName();
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

        $brands = Brand::all();


        return view('posts', ["posts" => $posts, "brands"=>$brands]);
    }

    public function getPost(Request $request)
    {

        $post = Post::find($request->id);

        $notes = $post->notes();

        if ($notes->count())
        {
            $count = $notes->count() ;
            $total = $notes->sum('note');
            $moy = $total/$count ;
            $moy = round($moy, 1);
        }


        return view('post', ["post" => $post, "moy" => $moy ?? null]);
    }

    public function updatePost(Request $request)
    {

        $post = Post::find($request->id);

        if ($post->user_id = !Auth::id())
            abort(404);

        return view('updatepost', ["post" => $post, "idPost" => $request->id])->with('info','Vous allez mettre à jour votre annonce');
    }

    public function deletePost(Request $request)
    {
        $post = Post::findOrFail($this->idPost);
        if ($post->user_id = !Auth::id())
            abort(404);

        $post->delete();
        return redirect(route('posts'))->with('warning','Votre annonce est supprimé');
    }


    public function filtre_dcr(Request $request)
    {
        $posts = Post::orderBy('price', 'desc')->get();
        return view('posts', ["posts" =>$posts]);
    }

    public function filtre_cr(Request $request)
    {

        $posts = Post::orderBy('price', 'asc')->get();
        return view('posts', ["posts" => $posts ]);
    }


}
