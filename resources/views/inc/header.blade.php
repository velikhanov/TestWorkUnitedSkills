
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">SUPER NAME OF TEST BLOG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <div class=" ml-auto">
          <ul class="navbar-nav">
            <li class="nav-item ml-5 {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{ Route('index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-5 {{ Request::is('categories') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('categories') }}">Categories</a>
            </li>
            @guest
            @if(Route::has('register'))
            <li class="nav-item ml-5">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            <li class="nav-item ml-5">
              <a class="nav-link" href="{{ route('login') }}">Sign in</a>
            </li>
            @else
            <li class="nav-item dropdown ml-5 {{ Auth::check() ? 'active' : '' }}">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span><img class="usericon" src="{{ ((Auth::user()->img) && (Storage::disk('public')->exists('users/'.Auth::user()->img))) ? (Storage::url('users/'.Auth::user()->img)) : '/img/user-img.png' }}">{{ Auth::user()->name }}</span><span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right logout" aria-labelledby="navbarDropdown">
  							  	<a class="dropdown-item" href="{{ route('user_panel') }}">Personal area</a>
                    <a id="logout-link" class="dropdown-item" href="#">Exit</a>
                    <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
  					@endguest
          </ul>
        </div>
      </div>
    </div>
</nav>
