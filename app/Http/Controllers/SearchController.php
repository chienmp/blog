<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%$query%")->get();

        return view('search', compact('posts', 'query', 'categories'));
    }
}
