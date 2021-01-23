@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/auth/postedit.css">
@endsection

@section('title', 'Post')

@section('content')
<section class="section">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="well well-sm">
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                  @isset($post)
                    action="{{ route('post.update', $post) }}"
                    @else
                    action="{{ route('post.store') }}"
                  @endisset
                  >
                  @isset($post)
                    @method('PUT')
                  @endisset
                    @csrf
                      <fieldset>
                          <legend class="text-center header">
                            @isset($post)
                                  <h1>Edit post<b></h1>
                              @else
                                  <h1>Create new post</h1>
                              @endisset
                            </legend>
                          @foreach ($errors->all() as $error)
                               <div class="alert alert-danger text-center mt-2  mb-1">{{$error}}</div>
                          @endforeach

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-pencil-alt bigicon"></i></span>
                              <div class="col-md-12">
                                  <input name="title" type="text" placeholder="Your title" class="form-control" required @empty($post)value="{{old('title')}}"@endempty @isset($post)value="{{ $post->title }}"@endisset>
                              </div>
                          </div>

                        @if($categories->isEmpty())
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-pencil-alt bigicon"></i></span>
                            <div class="col-md-12 text-center">
                              <select class="custom-select custom-select-lg mb-3">
                                  <option>Oops .. Looks like there are no categories</option>
                              </select>
                              <a class="btn btn-success" href="{{ route('category.create') }}">Create a new one!</a>
                            </div>
                        </div>
                        @else
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-pencil-alt bigicon"></i></span>
                              <div class="col-md-12">
                                <select name="category_id" class="custom-select custom-select-lg mb-3">
                                  @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                      @isset($post)
                                        @if($post->category_id == $category->id)
                                        selected
                                      @endif
                                      @endisset
                                      >{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                        @endif

                          <!-- <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                              <div class="col-md-8">
                                  <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                              </div>
                          </div> -->

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-pen-alt bigicon"></i></span>
                              <div class="col-md-12">
                                  <textarea class="form-control" name="content" placeholder="Enter your post here." rows="7" required>@empty($post){{ old('content') }}@endempty @isset($post){{ $post->content }}@endisset</textarea>
                              </div>
                          </div>

                          <label for="img" class="btn btn-warning ml-3">Add image</label>

                          <input id="img" type="file" name="postimg" style="display:none;">

                          <div class="form-group">
                              <div class="col-md-12 text-center">
                                  <button type="submit" class="btn btn-success btn-lg mb-5">Submit</button>
                              </div>
                          </div>
                      </fieldset>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
