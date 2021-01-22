<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
      $posts = Post::all();
      return view('index', compact('posts'));
    }

    public function categories(){

      $categories = Category::withCount('postcats')->get();

      return view('categories', compact('categories'));
    }

    public function category_($category){

      // $check = Category::where('code', $category)->withCount('postcats')->find(1);
      // if($check->postcats_count < 1){
      //   return redirect()->back()->with('warning', 'No posts in this category!');
      // }else{
        $category = Category::where('code', $category)->withCount('postcats')->get();

        return view('category_', compact('category'));
      // }
    }

    public function post($code, $id){
      if(!Post::where('id', $id)->exists())
      {
          return redirect()->back();
      }

      $specpost = Post::where('id', $id)->get();

      return view('post', compact('specpost'));
    }
}
