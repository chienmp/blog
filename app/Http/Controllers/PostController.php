<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(3);
        $categories =Category::all();

        return view('posts', compact('posts','categories'));
    }

    public function fetch(Request $request)
    {
        if($request->ajax())
        {
            $data = Post::latest()->paginate(3);
            
            return view('posts_child', compact('posts'))->render();
        }
    }

    public function details($id)
    {
        $post = Post::findOrFail($id);
        $blogKey = 'blog_' . $post->id;
        if (!session()->has($blogKey)) {
            $post->increment('view_count');
            session()->put($blogKey, 1);
        }

        $randomposts = Post::where('id', '<>', $id)->get()->random(1);
        $categories = Category::all();

        return view('post', compact('post', 'randomposts', 'categories'));
    }

    public function showPostByCate($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $posts = $category->posts()->get();

        return view('category', compact('category', 'posts', 'categories'));
    }

    public function showPostByTag($id)
    {
        $categories = Category::all();
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts()->get();

        return view('tag', compact('tag', 'posts', 'categories'));
    }
}
