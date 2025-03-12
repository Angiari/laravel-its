<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostCreatedMail;


class PostController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        //$posts = Post::where('title', 'LIKE', '%'.$search.'%')->get();
        $posts = Post::where(function($query)use($search){
            if($search){
                $query->where('title', 'LIKE', '%'.$search.'%');
            }
        })->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function savePost(Request $request){
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->long_description = $request->input('long_description');
        $post->user_id = auth()->user()->id;
        $post->save();

        Mail::queue(new PostCreatedMail($post));


        return redirect('posts');
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function updatePost($id, Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required'
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->long_description = $request->input('long_description');
        $post->save();
        $post->tags()->sync($request->input('tags'));
        return redirect('posts');
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');
    }
}
