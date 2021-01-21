@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/main/index.css">
<link rel="stylesheet" href="/css/main/slick.css">
<link rel="stylesheet" href="/css/main/slick-theme.css">
@endsection

@section('title', 'Category')

@section('content')
<section class="container">
    <div class="text-center">
      <a class="btn btn-primary mt-3" href="{{ route('category.create') }}">Create new category</a>
    </div>
    @foreach($category as $cat)
  <div class="row justify-content-center">
        <div class="col-md-6">

					<div class="box-part text-center bg-info rounded-lg">

						<div class="title">
							<h4>{{ $cat->name }}</h4>
						</div>
            <div class="">
                <a class="btn btn-warning" href="{{ route('category.edit', ['category' => $cat->id])}}">Edit category</a>
                <form class="" action="{{ route('category.destroy', ['category' => $cat->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                   <input type="submit" class="btn btn-danger" value="Delete category">
                </form>
            </div>
					 </div>
				</div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="cards">
          <!--  -->
          <div class="slider">
            @foreach($cat->postcats as $post)
              @if($cat->id === $post->category_id)
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
            @else
            <div class="text-center">
                <h1 class="text-warning">Temproraty empty!</h1>
                <a class="btn btn-success" href="{{ route('post.store') }}">Create new post</a>
            </div>
            @endif
            @endforeach
          </div>
          <!--  -->
        </div>

      </div><!-- /.blog-main -->
    </div>
    @endforeach
</section>
@endsection
@section('pagesjs')
<script src="/js/slick.min.js"></script>
<script src="/js/carousel.js"></script>
@endsection
