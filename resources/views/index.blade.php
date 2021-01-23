@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/main/index.css">
<link rel="stylesheet" href="/css/main/slick.css">
<link rel="stylesheet" href="/css/main/slick-theme.css">
@endsection

@section('title', '')

@section('content')
<div class="container-fluid">
  @include('inc.flash')
  <br class="mb-3">

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark pl-1">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">My Test Blog</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>

  <main role="main" class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="cards">
          <!--  -->
          <div class="slider">
            @foreach($category as $categories)
              @foreach($categories->postcats as $post)
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

      <aside class="col-md-4 blog-sidebar">
        <div class="text-center">
          <a type="button" href="{{ route('post.create')}}" class="btn btn-success mb-3">Cteate new post</a>
        </div>
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="font-italic">About</h4>
          <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>

        <div class="p-4">
          <h4 class="font-italic">Categories</h4>
          <ol class="mb-0">
            @foreach($category as $categories)
                  <a class="p-2 text-muted" href="{{ route('category', ['category' => $categories->code])}}">{{ $categories->name }}</a>|
            @endforeach
          </ol>
        </div>

        <div class="p-4">
          <h4 class="font-italic">Elsewhere</h4>
          <ol class="text-secondary">
            <li><a class="text-primary" href="#">GitHub</a></li>
            <li><a class="text-primary" href="#">instagram</a></li>
            <li><a class="text-primary" href="#">Facebook</a></li>
          </ol>
        </div>
      </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

  </main>
</div>
@endsection
@section('pagesjs')
<script src="/js/slick.min.js"></script>
<script src="/js/carousel.js"></script>
@endsection
