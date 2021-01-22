@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/auth/catedit.css">
@endsection

@section('title', 'Category')

@section('content')
<section class="section">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="well well-sm">
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                  @isset($category)
                    action="{{ route('category.update', $category) }}"
                    @else
                    action="{{ route('category.store') }}"
                  @endisset
                  >
                  @isset($category)
                    @method('PUT')
                  @endisset
                    @csrf
                      <fieldset>
                          <legend class="text-center header">
                            @isset($category)
                                  <h1>Edit category<b></h1>
                              @else
                                  <h1>Create new category</h1>
                              @endisset
                            </legend>
                          @foreach ($errors->all() as $error)
                               <div class="alert alert-danger text-center mt-2  mb-1">{{$error}}</div>
                          @endforeach

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-pencil-alt bigicon"></i></span>
                              <div class="col-md-12">
                                  <input name="name" type="text" placeholder="Category name" class="form-control" required @isset($category)value="{{ $category->name }}"@endisset>
                              </div>
                          </div>


                          <label for="img" class="btn btn-warning ml-3">Add image</label>

                          <input id="img" type="file" name="catimg" style="display:none;">

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
