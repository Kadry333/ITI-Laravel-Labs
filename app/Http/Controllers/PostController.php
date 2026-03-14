<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(15);
        
        return view('posts.index',['posts' => $posts]);
    }
    
    public function create()
    {
        $users = User::all();

        return view('posts.create',['users' => $users]);
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show',['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
          
        return view('posts.edit',['post' => $post, 'users' => $users]);
    }

    public function store()
    {
        Post::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => request('user_id'),
        ]);
        return to_route('posts.index');
    }
    public function update(Post $post)
    {
        $post->update([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => request('user_id'),
        ]);
        return to_route('posts.index');
    }
}
