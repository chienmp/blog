<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('profile', compact('user', 'categories'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $filename = '';
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $user->image = $filename;
            $request->image->storeAs('public/avatar', $filename);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $filename,
        ]);

        toast('Updated profile', 'success');

        return redirect()->route('home');
    }
}
