<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(12);
        $categories = Category::all('id', 'name');

        return response()->json([
            'success' => true,
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function show(Post $post)
    {
        $post = Post::where('id', $post->id)->with(['category', 'tags'])->first();
        return response()->json([
            'success' => true,
            'post' => $post,
        ]);
    }

    public function random() {
        $posts = Post::inRandomOrder()->limit(16)->get();
        return response()->json([
            'success' => true,
            'posts' => $posts,
        ]);
    }
}
