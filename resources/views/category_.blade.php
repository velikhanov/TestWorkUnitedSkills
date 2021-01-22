@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/main/index.css">
<link rel="stylesheet" href="/css/main/slick.css">
<link rel="stylesheet" href="/css/main/slick-theme.css">
@endsection

@section('title', 'Category')

@section('content')
<section class="container">
  @include('inc.flash')
    <div class="text-center">
      <a class="btn btn-primary mt-3" href="{{ route('category.create') }}">Create new category</a>
      <a class="btn btn-primary mt-3" href="{{ route('post.create') }}">Create new post</a>
    </div>
  <div class="row justify-content-center">
    @foreach($category as $cat)
        <div class="col-md-6">

					<div class="box-part text-center bg-info rounded-lg">

						<div class="title">
              <img style="width:50px;height: 50px;" src="{{ (($cat->img) && (Storage::disk('public')->exists('categories/'.$cat->img))) ? (Storage::url('categories/'.$cat->img)) : '/img/category.png' }}">
							<h4>{{ $cat->name }}</h4>
						</div>
            @if(Auth::check())
                @if(Auth::user()->role === 1)
            <div class="d-flex justify-content-center pt-3">
                <a class="btn btn-warning mr-2" href="{{ route('category.edit', ['category' => $cat->id])}}">Edit category</a>
                <form class="ml-2" action="{{ route('category.destroy', ['category' => $cat->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                   <input type="submit" class="btn btn-danger" value="Delete category">
                </form>
            </div>
                @endif
              @endif
					 </div>
				</div>
      @endforeach
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="cards">
          <!--  -->
          <div class="slider">
            @foreach($category as $cat)
              @foreach($cat->postcats as $post)
              <div class="cards-wrapper">
                <div class="card-grid-space">
                  <a class="card" href="{{ route('post', ['category' => $post->category->code, 'id' => $post->id ])}}" style="--bg-img: url('/img/blog.jpg')">
                    <div class="mr-auto">
                      <h1 class="text-center ">{{ $post->Part_of_Char_Title }}</h1>
                      <p class="text-left ">{{ $post->Part_of_Char }}...</p>
                      <p class="text-left ">Continue reading...</p>
                        <!-- <div class="date"><span class="mr-5">{{ $post->user->name}}</span>{{ $post->created_at}}</div> -->
                      <div class="tags">
                        <div class="tag">{{ $post->category->name }}</div>
                      </div>
                      <div><span class="date-left">{{ $post->user->name}}</span><span class="date-right">{{ $post->created_at}}</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
            @endforeach
          </div>
          <!--  -->
        </div>

      </div><!-- /.blog-main -->
    </div>
</section>
@endsection
@section('pagesjs')
<script src="/js/slick.min.js"></script>
<script src="/js/carousel.js"></script>
@endsection
