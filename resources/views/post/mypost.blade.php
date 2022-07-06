@extends('layout.master')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix following errors.
            </div>
        @endif
        <a href="/listing/post" class="btn btn-success mb-5">Add New Post</a>
        <h1 class="display-5 fw-bold">My Post</h1>
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Salary</th>
                            <th>Hiring</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->salary }}</td>
                                <td>{{ $post->hiring }}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="/listing/delete/{{ $post->id }}">Delete</a>
                                    <a class="btn btn-success" href="/listing/edit/{{ $post->id }}">Edit</a>
                                    <a target="_blank" class="btn btn-primary" href="/listing/show/{{ $post->id }}">Preview</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->links() !!}
            </div>
            <div class="col-md-3">
                <h4>Trash</h4>
                @if($deleted_post->count())
                    <ul>
                        @foreach($deleted_post as $post)
                            <li>{{ $post->title }} <a href="/listing/restore/{{ $post->id }}">Restore</a>
                                <br><span class="small">deleted at: {{ $post->deleted_at->format('d-M-Y H:m') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else 
                    <h6>Empty</h6>
                @endif
               </div>
        </div>
    
    </div>
</div>
@endsection