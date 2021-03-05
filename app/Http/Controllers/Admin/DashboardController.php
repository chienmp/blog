<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getDataChartJs()
    {
        $result = Post::latest()->get();

        return response()->json($result);
    }

}
