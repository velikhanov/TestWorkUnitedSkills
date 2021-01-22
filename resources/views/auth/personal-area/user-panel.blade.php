@extends('layouts.app')

@section('pagestyles')
<link rel="stylesheet" href="/css/main/jquery.fancybox.min.css">
<link rel="stylesheet" href="/css/auth/user-panel.css">
@endsection

@section('title', 'Personal area')

@section('content')
<section>
  <div class="container emp-profile">
            <!-- Flash notification -->
            @if(Session::has('success'))
            <p class="alert alert-success text-center mb-3">
              <strong> {{ Session::get('success') }} </strong>
            </p>
            @endif
            <!-- End flash notification -->
            <form action="{{ route('user_edit') }}" method="POST" enctype="multipart/form-data" class="userpanelform">
                  @csrf
                  <div class="row justify-content-center">
                      <div class="col-md-4">
                          <div class="profile-img">
                              <a href="{{ ((Auth::user()->img) && (Storage::disk('public')->exists('users/'.Auth::user()->img))) ? (Storage::url('users/'.Auth::user()->img)) : '/img/user-img.png' }}" data-fancybox="gallery-1"><img src="{{ ((Auth::user()->img) && (Storage::disk('public')->exists('users/'.Auth::user()->img))) ? (Storage::url('users/'.Auth::user()->img)) : '/img/user-img.png' }}" class="rounded-circle img-thumbnail shadow-sm"></a>
                              <!-- <img src="/img/user-img.png" alt=""> -->
                              <div class="file btn btn-lg btn-primary">
                                  Change image
                                  <input type="file" name="userimg"/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="profile-head">
                                      <h5>
                                        <i>Welcome, </i><strong>{{ Auth::user()->name }}</strong><i>!</i>
                                      </h5>
                                      <br><br>
                              <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active text-primary" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-primary" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Posts</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- <div class="social-links">
                        <a href=""><i class="fab fa-instagram"></i></a><br/>
                        <a href=""><i class="fab fa-facebook-f"></i></a><br/>
                        <a href=""><i class="fab fa-pinterest-p"></i></a>
                      </div> -->
                  </div>
                  <div class="row justify-content-center">
                      <!-- <div class="col-md-4">
                          <div class="profile-work">
                              <p>Navigation</p>
                              <a href="{{ route('index') }}">Home</a><br/>
                              <a href="{{ route('categories') }}">Categories</a><br/>
                          </div>
                      </div> -->
                      <div class="col-md-8">
                          <div class="tab-content profile-tab" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row justify-content-center">
                                      <div class="col-10">
                                        <table class="table usertable">
                                          <thead>
                                              <tr>
                                                <th scope="col"></th>
                                                <td></td>
                                                <td><a class="" href=""><i class="fas fa-edit text-warning"></i><i class="fas fa-times text-danger" style="display:none"></i></a><td>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="col">Name</th>
                                                <td class="userdata">{{ Auth::user()->name }}</td>
                                                <td class="useredit"><input name="name" placeholder="{{ Auth::user()->name }}"><td>
                                              </tr>
                                              <tr>
                                                <th scope="col">E-Mail</th>
                                                <td class="userdata">{{ Auth::user()->email }}</td>
                                                <td class="useredit"><input name="email" placeholder="{{ Auth::user()->email }}"><td>
                                              </tr>
                                              <!-- <tr>
                                                <th scope="col">Phone</th>
                                                <td class="userdata">{{ Auth::user()->phone }}</td>
                                                <td class="useredit"><input name="phone" placeholder="{{ Auth::user()->phone }}"></td>
                                              </tr> -->
                                              <tr>
                                                <th></th>
                                                <td><input class="useredit btn btn-success" type="submit" value="Save"></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table usertable">
                                          @foreach($posts as $post)
                                          <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Link</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                <th scope="row"><img src="/img/blog.jpg" width="100px;"></th>
                                                <td scope="row">{{ $post->Part_of_Char_Title }}</td>
                                                <td scope="row">{{ $post->Part_of_Char }}..</td>
                                                <td class="btn btn-info openpost"><a href="{{ route('post', ['category' => $post->category->code, 'id' => $post->id])}}">Open</a></td>
                                              </tr>
                                            </tbody>
                                            @endforeach
                                          </table>
                                      </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </form>
          </div>
</section>

@endsection
@section('pagesjs')
<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/script.js"></script>
@endsection
