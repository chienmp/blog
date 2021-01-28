<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function details($id){
        $post = Post::findOrFail($id);
        $randomposts = Post::all()->random(1);
        $categories=Category::all();

        return view('post', compact('post', 'randomposts', 'categories'));
    }
}
