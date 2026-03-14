<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $post->comments()->create([
            'body' => request('body')
        ]);

        return back();
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
    public function update(Comment $comment)
{
    $comment->update([
        'body' => request('body')
    ]);

    return back();
}
}
