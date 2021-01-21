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

      $categories = Category::all();

      return view('categories', compact('categories'));
    }

    public function category($category){

      $category = Category::where('code', $category)->get();

      return view('category', compact('category'));
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
