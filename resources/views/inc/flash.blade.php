    @if(Session::has('success'))
    <div class="col-lg-12">
      <p class="alert alert-success text-center mt-2  mb-1">
        <strong> {{ Session::get('success') }} </strong>
      </p>
    </div>
    @endif
    @if(Session::has('warning'))
    <div class="col-lg-12">
      <p class="alert alert-warning text-center mt-2  mb-1">
        <strong> {{ Session::get('warning') }} </strong>
      </p>
    </div>
    @endif
    @if(Session::has('no-posts'))
    <div class="col-lg-12">
      <p class="alert alert-warning text-center mt-2  mb-1">
        <strong>No posts in <u>{{ Session::get('no-posts') }}</u> category!</strong>
      </p>
    </div>
    @endif
    @if(Session::has('danger'))
    <div class="col-lg-12">
      <p class="alert alert-danger text-center mt-2  mb-1">
        <strong> {{ Session::get('danger') }} </strong>
      </p>
    </div>
    @endif
