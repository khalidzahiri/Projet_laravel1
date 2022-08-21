<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $video = Video::find(1);

        return view('articles',[
            'posts'=> $posts,
            'video' => $video
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);


        return view('article',[
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $contenu = $input['content'];
        Post::create([
            'title' => $request->title,
            'content' => $contenu
        ]);

    }

    public function contact()
    {
        return view('contact');
    }
    public function register()
    {
        $post = Post::find(11);
        $video = Video::find(1);

        $comment1 = new Comment(['content'=> 'Mon premier commentaire']);
        $comment2 = new Comment(['content'=> 'Mon deuxième commentaire']);
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['content'=> 'Mon troisième commentaire']);
        $video->comments()->save($comment3);

    }
}
