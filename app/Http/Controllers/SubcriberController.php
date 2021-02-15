<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcribeRequest;
use App\Models\Subcriber;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubcriberController extends Controller
{
   public function store(SubcribeRequest $request){
       Subcriber::Create([
          'email' => $request->email,
       ]);
       toast(trans('subcribe_submit'), 'success');

       return redirect()->back();
   }
}
