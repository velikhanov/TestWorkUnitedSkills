<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();

      $input['user_id'] = Auth::user()->id;

      Comment::create($input);

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
      if(Auth::user()->id !== $comment->user_id && Auth::user()->role !== 1){
        return redirect()->back()->with('warning', 'Insufficient authority!');
      }else{

      $input = $request->all();

      $input['user_id'] = $comment->user_id;

      $comment->update($input);

      return redirect()->back();
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if(Auth::user()->id !== $comment->user_id && Auth::user()->role !== 1){
          return redirect()->back()->with('warning','Insufficient authority!');
        }else{
          $comment->delete();
          if(($comment->parent_id === $comment->id) !== 0){
            $comment->replies()->delete();
          }
          return redirect()->back();
        }
    }
}
