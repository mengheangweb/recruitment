@extends('layout.master')
@section('title')
Login
@endsection
@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
      @if($errors->any())
          <div class="alert alert-danger" role="alert">
              Please fix following errors.
          </div>
      @endif
      <form action="{{ route('do-login') }}" method="post">
          @csrf
          <div class="row">
              <div class="col-md-6">
                <h1 class="display-6 fw-bold mb-3">Login</h1>
                  <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" aria-describedby="">
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="inputPassword" aria-describedby="">
                  </div>
              </div>
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <a class="mt-5" href="/register">or sign up here</a>
          </div>
      </form>
  </div>
</div>
@endsection