<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.user.catform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['code'] = mb_strtolower($request->name);

        if ($request->hasFile('catimg')){
          $data['img'] = 'img_'.Auth::user()->id.time().'.'.$request->file('catimg')->getClientOriginalExtension();
          $request->file('catimg')->storeAs('categories', $data['img']);
          }

        Category::create($data);
        return redirect()->route('categories')->with('success', 'Category created successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if(Auth::user()->role !== 1){
          return redirect()->back()->with('danger', 'Insufficient authority! Contact the administrator!');
        }else{
          return view('auth.user.catform', compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      if(Auth::user()->role !== 1){
        return redirect()->back()->with('danger', 'Insufficient authority! Contact the administrator!');
      }else{
      $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id.'|max:255'
        ]);

        $data = $request->all();
        $data['user_id'] = $category->user_id;
        $data['code'] = mb_strtolower($request->name);

        if ($request->hasFile('catimg')){
          Storage::disk('public')->exists('categories/'.$category->img)?Storage::disk('public')->delete('categories/'.$category->img):NULL;
          unset($data['img']);
          $data['img'] = 'img_'.Auth::user()->id.time().'.'.$request->file('catimg')->getClientOriginalExtension();
          $request->file('catimg')->storeAs('categories', $data['img']);
        }
        $category->update($data);

          return redirect()->route('category', ['category' => $category->code])->with('success', 'Category updated successfuly!');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      if(Auth::user()->role !== 1){
        return redirect()->back()->with('danger', 'Insufficient authority! Contact the administrator!');
      }else if(($category->postcats() === $category->id) !== 0){
          return redirect()->back()->with('danger', 'This category has posts, you cannot delete it!');
        }else{
        Storage::disk('public')->exists('categories/'.$category->img)?Storage::disk('public')->delete('categories/'.$category->img):NULL;
        $category->delete();
        return redirect()->route('categories')->with('danger', 'Category deleted successfuly!');;
      }
  }
}
