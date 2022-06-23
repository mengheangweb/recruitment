@extends('layout.master')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
      @if($errors->any())
          <div class="alert alert-danger" role="alert">
              Please fix following errors.
          </div>
      @endif
      <form action="{{ route('store-registration') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-md-6">
                <h1 class="display-6 fw-bold mb-3">Personal Info</h1>
                  <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputTitle" aria-describedby="">
                  </div>
                  <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" aria-describedby="">
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="inputPassword" aria-describedby="">
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="inputPasswordConfirmation" aria-describedby="">
                  </div>
              </div>
              <div class="col-md-6">
                  <h1 class="display-6 fw-bold mb-3">Company Info</h1>
                  <div class="mb-3">
                    <label for="inputCompanyName" class="form-label">Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" id="inputCompanyName" aria-describedby="">
                  </div>
                  <div class="mb-3">
                    <label for="inputLogo" class="form-label">Logo</label>
                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control" id="inputLogo" aria-describedby="">
                  </div>
                  <div class="mb-3">
                      <label for="inputProfile" class="form-label">Company Profile</label>
                      <textarea name="profile" class="form-control summernote" id="inputProfile">{{ old('profile') }}</textarea>
                  </div>
              </div>
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </form>
  </div>
</div>
@endsection