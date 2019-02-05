<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->where('visible', 1)->paginate(3);

        return view('layouts.blog.index',compact('posts'));
    }
    public function show(Post $post)
    {
        $populars = Post::orderBy('created_at', 'desc')->get()->take(4);
        return view('layouts.blog.show',compact(['post','populars']));
    }
}
