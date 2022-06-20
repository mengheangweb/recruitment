@extends('layout.master')

@section('content')
<h4 class="mb-3">Listing</h4>

<div class="row">
    @foreach($listing as $post)
        <div class="col-md-3">
            <div class="card mb-3" style="width: 18rem;">
                <img src="https://logos-world.net/wp-content/uploads/2020/09/Heineken-Logo-1991-present.jpg" class="card-img-top p-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>Salary: {{ $post->salary }}</p>
                    <a href="#" class="btn btn-primary mt-2">Apply Now</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        {{ $listing->links() }}
    </div>
</div>

@endsection