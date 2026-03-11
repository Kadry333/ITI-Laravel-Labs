<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public $posts = [
            [
                'id' =>1,
                'title' => 'first post',
                'description' => 'some description',
                'created_at' => '2026-03-11 10:00:00',
                'creator' => [
                    'name' => 'Ahmed',
                    'email' => 'ahmed@gmail.com',
                    'created_at' => '2024-09-01 08:00:00'
                ]
            ],
            [
                'id' =>2,
                'title' => 'second post',
                'description' => 'some description 2',
                'created_at' => '2026-03-11 10:00:00',
                'creator' => [
                    'name' => 'Kareem',
                    'email' => 'mohamed@gmail.com',
                    'created_at' => '2024-09-01 08:00:00'
                ]
                ],
                [
                    'id' =>3,
                    'title' => 'third post',
                    'description' => 'some description 2',
                    'created_at' => '2026-03-11 10:00:00',
                    'creator' => [
                        'name' => 'Ali',
                        'email' => 'Ali@gmail.com',
                        'created_at' => '2024-09-01 08:00:00'
                    ]
                ]
        ];
    public function index()
    {
        
        return view('posts.index',['posts' => $this->posts]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function show($id)
    {
        $post = $this->posts[$id-1];
        
        return view('posts.show',['post' => $post]);
    }

    public function destroy($id)
    {
        $post = $this->posts[$id-1];
        return view('posts.destroy');
    }

    public function edit($id)
    {
        $post = $this->posts[$id-1];
          
        return view('posts.edit',['post' => $post]);
    }

    public function store()
    {
        $message = 'Post created successfully';
        return to_route('posts.index',$message);
    }
}
