<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Jobs\PruneOldPostsJob;
use Illuminate\Support\Facades\Storage;



// use Symfony\Component\HttpKernel\HttpCache\Store;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->paginate(15);


        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function show(Post $post)
    {


        return view('posts.show', ['post' => $post]);
    }

    public function destroy(Post $post)
    {

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        Post::create($data);

        return to_route('posts.index');
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
        }
        $data = $request->validated();


        $post->update($data);

        return to_route('posts.index');
    }
}
