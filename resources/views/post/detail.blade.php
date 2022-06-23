@extends('layout.master')

@section('content')
<h4 class="mb-5 mt-5">{{ $post->title }}</h4>

<div class="row">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item">Hiring: {{ $post->hiring }}</li>
            <li class="list-group-item">Salary: {{ $post->salary }}</li>
            <li class="list-group-item">Post Date: {{ $post->created_at->format('d-M-Y') }}</li>
        </ul>
    </div>
    <div class="col-md-3 offset-md-6">
        @if($post->company && $post->company->logo)
            <img src="{{ asset('storage/'. $post->company->logo) }}" class="img-thumbnail" alt="...">
        @else
            <img src="{{ asset('icon/no-logo.png') }}" class="img-thumbnail" alt="...">
        @endif
        <h5 class="pt-3">{{ $post->company->name }}</h5>
    </div>
    <div class="col-md-12">
        <h5>About Comapany</h5>
        {!! $post->company->profile !!}
    </div>
    <div class="col-md-12">
        <h5>Requirement</h5>
        {!! $post->requirment !!}
    </div>
    <div class="col-md-12">
        <h5>Description</h5>
        {!! $post->description !!}
    </div>
    <div class="col-md-12">
        @foreach($post->tag as $tag)
            <span class="badge bg-success">{{ $tag->name }}</span>
        @endforeach
    </div>
</div>

@endsection