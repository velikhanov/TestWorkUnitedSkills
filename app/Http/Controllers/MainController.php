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
      $category = Category::has('postcats')->get();
      
      return view('index', compact('category'));
    }

    public function categories(){

      $categories = Category::withCount('postcats')->get();

      return view('categories', compact('categories'));
    }

    public function category_($category){

      $categoryName = Category::where('code', $category)->first();

      if(Category::where('code', $category)->has('postcats')->count() < 1){
        return redirect()->route('categories')->with('no-posts', $categoryName->name);
      }else{
        $category = Category::where('code', $category)->get();

        return view('category_', compact('category'));
      }
    }

    public function post($code, $id){
      if(!Post::where('id', $id)->exists())
      {
          return redirect()->back();
      }

      $specpost = Post::where('id', $id)->get();

      $tenposts = Post::where('id','<>', $id)->inRandomOrder()->limit(2)->get();

      return view('post', compact('specpost', 'tenposts'));
    }
}
