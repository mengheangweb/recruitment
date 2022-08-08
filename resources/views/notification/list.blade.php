@extends('layout.master')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix following errors.
            </div>
        @endif
        <h1 class="display-5 fw-bold">My notification</h1>
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td class="@if($notification->read_at ) text-muted @endif">
                                    {{-- @if(isset($notification->data['message']))
                                     {{ $notification->data['message'] }}
                                    @endif --}}
                                    @if($notification->type == 'App\Notifications\PostResponse')
                                        Your post was {{ $notification->data['post_status'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(! $notification->read_at)
                                        <a href="/notification/{{ $notification->id }}">Mark as read</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    
    </div>
</div>
@endsection