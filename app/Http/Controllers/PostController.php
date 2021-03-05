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
        $posts = Post::latest()->paginate(config('post.allposts'));
        $categories =Category::all();

        return view('posts', compact('posts','categories'));
    }

    public function fetch(Request $request)
    {
        if($request->ajax())
        {
            $data = Post::latest()->paginate(config('post.home'));

            return view('posts_child', compact('posts'))->render();
        }
    }

    public function details($id)
    {
        $post = Post::findOrFail($id);
        $blogKey = config('post.blog') . $post->id;
        if (!session()->has($blogKey)) {
            $post->increment('view_count');
            session()->put($blogKey, config('post.viewcount'));
        }

        $randomposts = Post::where('id', '<>', $id)->get()->random(config('post.randomposts'));
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
