<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FavoriteController extends Controller
{
    public function add($id)
    {
        // return json_encode(12);
        $post = Post::findOrFail($id);
        $user= Auth::user();
        $favorite = $user->favorite_posts()->where('post_id', $post)->count();
        $total = $post->with('favorite_to_users')->withCount('favorite_to_users')->find($id);
        if ($favorite == 0)
        {
            $user->favorite_posts()->attach($post);
            Alert::success('Success', 'Post has been addded to your favorite list'); 
        } else {
            $user->favorite_post()->detach();
            Alert::success('Success', ' U have removed your favorite post');
        }
    }
}
