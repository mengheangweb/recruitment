@extends('layout.master')

@section('content')
<h4 class="mb-3">Listing</h4>

<div class="row">
    @foreach($listing as $post)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                @if($post->company && $post->company->logo)
                    <img src="{{ asset('storage/'. $post->company->logo) }}" class="card-img-top p-3" alt="...">
                @else
                    <img src="{{ asset('icon/no-logo.png') }}" class="card-img-top p-3" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>Salary: {{ $post->salary }}</p>
                    <a href="/listing/show/{{ $post->id }}" class="btn btn-primary mt-2">Apply Now</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        {{ $listing->links() }}
    </div>
</div>

@endsection