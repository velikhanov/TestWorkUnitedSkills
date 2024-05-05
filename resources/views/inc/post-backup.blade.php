@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/main/post.css">
@endsection

@section('title', 'Posts')

@section('content')
<div class="container">

  @include('inc.flash')
  <br class="mb-3">
  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">My Test Blog</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
  <div class="row mb-2">
@foreach($tenposts as $tpost)
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 customflex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">{{ $tpost->category->name }}</strong>
          <h3 class="mb-0">{{ Str::limit($tpost->title, 10) }}..</h3>
          <div class="mb-3 text-muted"></div>
          <p class="mb-auto">{{ Str::limit($tpost->content, 50) }}</p>
          <a href="{{ route('post', ['category' => $tpost->category->code, 'id' => $tpost->id]) }}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{ (($tpost->img) && (Storage::disk('public')->exists('posts/'.$tpost->img))) ? (Storage::url('posts/'.$tpost->img)) : '/img/blog.jpg' }}" style="width: 250px; height: 265px">
        </div>
      </div>
    </div>
@endforeach
  </div>
</div>
<!--  -->
<main role="main" class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 blog-main">
      <div class="text-center">
        <a type="button" href="{{ route('post.create') }}" class="btn btn-success mb-3">Cteate new post</a>
      </div>
      @foreach($specpost as $post)
      <div class="card mb-3">
        <img src="{{ (($post->img) && (Storage::disk('public')->exists('posts/'.$post->img))) ? (Storage::url('posts/'.$post->img)) : '/img/blog.jpg' }}" class="img-fluid" style="max-height: 400px; width: 75%;display:block; margin:0 auto;border-radius: 20px;margin-top: 10px;">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text text-justify">{{ $post->content }}</p>
          <hr>
          <div class="customflex justify-content-between"><p class="blog-post-meta">{{ $post->created_at}}</p><a class="text-primary d-block" href="#">{{ $post->user->name }}<img class="d-block ml-auto mr-auto" style="width:30px;height: 30px;border-radius:25px;" src="{{ (($post->user->img) && (Storage::disk('public')->exists('users/'.$post->user->img))) ? (Storage::url('users/'.$post->user->img)) : '/img/user-img.png' }}"></a></div>
          <div class="customflex justify-content-center">

            @if(Auth::check())
                @if(Auth::user()->id == $post->user_id || Auth::user()->role == 1)
              <a class="btn btn-warning mr-3" href="{{ route('post.edit',['post' => $post->id]) }}" type="button">Edit post</a>
              <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete post">
              </form>
              @endif
            @endif
          </div>
        </div>
      </div>
      <hr class="mb-3">
        <p class="alert alert-warning text-center mt-2  mb-1">
          <strong>Attention! You can edit and delete, only the post(-s) you added!</strong>
        </p>
      <hr class="mb-3">
      <!-- Add Comment Form -->
      <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        <h3 class="text-success text-center">Comments</h3>
        <div class="form-group customflex justify-content-center">
            <!-- <span class="col-md-1 col-md-offset-2"></span> -->
            <div class="col-md-10">
                <textarea class="form-control" name="content" placeholder="Enter your comment here" rows="5" required></textarea>
                <div class="text-right">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input class="offset btn btn-success mt-1" type="submit" name="addcomment" value="Add comment">
                </div>
            </div>
        </div>
      </form>
      <!-- End Add Comment Form -->
      @endforeach
        <!--Start Comments  -->
        <div class="bootstrap snippets bootdey">
          <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                <hr/>
                <ul class="comments">
                @foreach($specpost as $comments)
                  @foreach($comments->comments->sortByDesc('id') as $comment)
                  <li class="clearfix">
                @if($comment->parent_id == 0)
                    <img src="{{ (($comment->user->img) && (Storage::disk('public')->exists('users/'.$comment->user->img))) ? (Storage::url('users/'.$comment->user->img)) : '/img/user-img.png' }}" class="avatar">
                    <div class="post-comments mainpostcommnets">
                        <p class="meta customflex justify-content-between"><a href="#">{{ $comment->user->name }}</a><span>{{ $comment->user->created_at }}</span></p>
                        <p>
                            {{ $comment->content }}
                        </p>
                        @if(Auth::check())
                          @if(Auth::user()->id == $comment->user_id || Auth::user()->role == 1)
                        <div class="customflex justify-content-end">
                            <!-- <a class="addsubcomment text-primary" href="#">Add comment</a> -->
                            <a class="offset editcomment text-warning ml-5" href="#">Edit comment</a>
                            <form class="deletecommform ml-5" action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="POST">
                              @method('DELETE')
                              @csrf
                                <a class="deletecommbtn text-danger" href="#">Delete comment</a>
                            </form>
                        </div>
                          @endif
                        @endif
                    </div>
                    <form class="hideclass editcommentblock customflex justify-content-center" action="{{ route('comment.update', ['comment' => $comment->id  ]) }}" method="POST">
                      @method('PUT')
                      @csrf
                        <textarea class="post-comments editcommentform" name="content" rows="3" required>{{ $comment->content }}</textarea>
                          <div class="customflex editcommnetfonts ml-3">
                            <a class="replysub fas fa-times mt-2"></a>
                            <button type="submit" class="offset replysub fas fa-paper-plane mt-auto mb-1"></button>
                         </div>
                    </form>
                    @endif
                        @foreach($comment->replies as $subcomment)
                        <ul class="comments mt-3">
                            <li class="clearfix">
                                <img src="{{ (($subcomment->user->img) && (Storage::disk('public')->exists('users/'.$subcomment->user->img))) ? (Storage::url('users/'.$subcomment->user->img)) : '/img/user-img.png' }}" class="avatar">
                                <div class="post-comments mainpostsubcommnets">
                                      <p class="meta customflex justify-content-between"><a href="#">{{ $subcomment->user->name }}</a><span>{{ $subcomment->user->created_at }}</span></p>
                                    <p>
                                        {{ $subcomment->content }}
                                    </p>
                                    @if(Auth::check())
                                      @if(Auth::user()->id == $subcomment->user_id || Auth::user()->role == 1)
                                    <div class="customflex justify-content-end">
                                        <a class="editsubcomment text-warning ml-5" href="#">Edit comment</a>
                                        <form class="deletesubcommform ml-5" action="{{ route('comment.destroy', ['comment' => $subcomment->id]) }}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                            <a class="deletesubcommbtn text-danger" href="#">Delete comment</a>
                                        </form>
                                    </div>
                                      @endif
                                    @endif
                                </div>
                                <form class="hideclass editsubcommentblock customflex justify-content-center" action="{{ route('comment.update', ['comment' => $subcomment->id  ]) }}" method="POST">
                                  @method('PUT')
                                  @csrf
                                    <textarea class="post-comments editcommentform" name="content" rows="3" required>{{ $subcomment->content }}</textarea>
                                      <div class="customflex editcommnetfonts ml-3">
                                        <a class="replysub fas fa-times mt-2"></a>
                                        <button type="submit" class="offset replysub fas fa-paper-plane mt-auto mb-1"></button>
                                     </div>
                                </form>
                            </li>
                        </ul>
                      @endforeach
                      <div class="customflex justify-content-end">
                          <a class="addsubcomment text-primary mt-1 mb-3 mr-3" href="#">Add comment</a>
                      </div>
                  <form method="POST" class="w-100" action="{{ route('comment.store') }}">
                    @csrf
                    <div class="hideform replyform mb-3 mt-3">
                        <input type="hidden" name="post_id" value="{{ $comment->post->id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <input class="ml-auto w-50" type="text" name="content" required>
                        <button type="submit" class="offset replysub fas fa-paper-plane ml-1"></button>
                    </div>
                  </form>
                </li>
                    @endforeach
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!--End Comments -->
    </div><!-- /.blog-main -->

    <!-- <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Categories</h4>
        <ol class="mb-0">
          <a class="p-2 text-muted" href="#"></a>|
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
    </aside> -->

  </div><!-- /.row -->

</main>
@endsection
@section('pagesjs')
<script src="/js/offset.js"></script>
<script src="/js/script.js"></script>
@endsection
