<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  public function user_panel(){
    $posts = Auth::user()->posts;
    return view('auth.personal-area.user-panel', compact('posts'));
  }

  public function user_edit(Request $request){

    $user = Auth::user();

    $user->name = $request->input('name')?$request->input('name'):Auth::user()->name;
    $user->email = $request->input('email')?$request->input('email'):Auth::user()->email;
    // $user->phone = $request->input('phone')?$request->input('phone'):(Auth::user()->phone?Auth::user()->phone:NULL);

    if ($request->hasFile('userimg')){
      Storage::disk('public')->exists('users/'.$user->img)?Storage::disk('public')->delete('users/'.$user->img):NULL;
      $user->img = 'img_'.$user->id.time().'.'.$request->file('userimg')->getClientOriginalExtension();
      $request->file('userimg')->storeAs('users', $user->img);
      }

    $user->update();

    return redirect()->back()->with('success', 'Yout data successfuly unpdated!');
  }
}
