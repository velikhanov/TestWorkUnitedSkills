<div class="container">
    <div class="col-lg-12">
    @if(Session::has('success'))
      <p class="alert alert-success text-center mt-2  mb-1">
        <strong> {{ Session::get('success') }} </strong>
      </p>
    @endif
    </div>
    <div class="col-lg-12">
    @if(Session::has('warning'))
      <p class="alert alert-warning text-center mt-2  mb-1">
        <strong> {{ Session::get('warning') }} </strong>
      </p>
    @endif
    </div>
    <div class="col-lg-12">
    @if(Session::has('no-posts'))
      <p class="alert alert-warning text-center mt-2  mb-1">
        <strong>No posts in <u>{{ Session::get('no-posts') }}</u> category!</strong>
      </p>
    @endif
    </div>
    <div class="col-lg-12">
    @if(Session::has('danger'))
      <p class="alert alert-danger text-center mt-2  mb-1">
        <strong> {{ Session::get('danger') }} </strong>
      </p>
    @endif
    </div>
</div>
