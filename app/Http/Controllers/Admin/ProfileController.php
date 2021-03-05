<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('admin.profile', compact('user'));
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

        return redirect()->route('dashboard');
    }
}
