@extends('layout.master')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Welcome Recruitment site</h1>
      <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      <a href="/listing/post" class="btn btn-primary btn-lg" type="button">Post a Job Now</a>
    </div>
  </div>
  {{-- Latest job --}}
  <h4 class="mb-3">Latest Posting</h4>

    <div class="row">
        @foreach($listing as $post)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="https://logos-world.net/wp-content/uploads/2020/09/Heineken-Logo-1991-present.jpg" class="card-img-top p-3" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>Salary: {{ $post->salary }}</p>
                        <a href="#" class="btn btn-primary mt-2">Apply Now</a>
                    </div>
                </div>
            </div>
        @endforeach

        <a href="/listing">See all Posts</a>
    </div>
  
  
@endsection