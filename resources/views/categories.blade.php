@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/main/index.css">
<link rel="stylesheet" href="/css/main/slick.css">
<link rel="stylesheet" href="/css/main/slick-theme.css">
@endsection

@section('title', 'Categories')

@section('content')
<section class="container">
  @include('inc.flash')
    <div class="text-center">
      <a class="btn btn-primary mt-3" href="{{ route('category.create') }}">Create new category</a>
    </div>
  <div class="row">
        @foreach($categories as $category)
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<div class="box-part text-center bg-info rounded-lg">

						<div class="title">
							<h4>{{ $category->name }}</h4>
						</div>

						<a href="{{ route('category', $category->code)}}">Open</a>

            <div class="">
                <a class="btn btn-warning" href="{{ route('category.edit', ['category' => $category->id])}}">Edit category</a>
                <form class="" action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                   <input type="submit" class="btn btn-danger" value="Delete category">
                </form>
            </div>
					 </div>
				</div>
        @endforeach
      </div>
      <div class="col-md-12">
        <div class="cards">
          <!--  -->
          <div class="slider">
          @foreach($categories as $category)
            @foreach($category->postcats as $post)
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
