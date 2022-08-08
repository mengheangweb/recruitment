@extends('admin.layout.master')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Listing</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tile</th>
                        <th scope="col">Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row"></th>
                                <td>{{ $post->title }} <span class="badge bg-success">{{ $post->status }}</span></td>
                                @if($post->status == 'pedding')
                                    <td><a href="/admin/response/{{ $post->id }}/reject" class="btn btn-sm btn-danger">Reject</a></td>
                                    <td><a href="/admin/response/{{ $post->id }}/approve" class="btn btn-sm btn-primary">Approve</a></td>
                                @elseif($post->status == 'reject')
                                    <td><a href="/admin/response/{{ $post->id }}/approve" class="btn btn-sm btn-primary">Approve</a></td>
                                @elseif($post->status == 'approve')
                                    <td><a href="/admin/response/{{ $post->id }}/reject" class="btn btn-sm btn-danger">Reject</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</main>

@endsection
