@extends('layout.master')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix following errors.
            </div>
        @endif
        <h1 class="display-5 fw-bold">Post Ads</h1>
        <form action="{{ route('store-post') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="inputTitle" class="form-label">Title</label>
                      <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="inputTitle" aria-describedby="">
                    </div>
                    <div class="mb-3">
                      <label for="inputHiring" class="form-label">Number of Hiring</label>
                      <input type="number" name="hiring" value="{{ old('hiring') }}" class="form-control" id="inputHiring" aria-describedby="">
                    </div>
                    <div class="mb-3">
                      <label for="inputSalary" class="form-label">Salary</label>
                      <input type="number" name="salary" value="{{ old('salary') }}" class="form-control" id="inputSalary" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        @foreach($tags as $tag)
                            <div class="form-check">
                                <input class="form-check-input" name="tag[]" type="checkbox" value="{{ $tag->id }}">
                                <label class="form-check-label">
                                {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Job Description</label>
                        <textarea name="description" class="form-control summernote" id="inputDescription">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="inputRequirment" class="form-label">Job Requirment</label>
                        <textarea name="requirment" class="form-control summernote @error('requirment') is-invalid @enderror " id="inputRequirment">{{ old('requirment') }}</textarea>
                        @error('requirment')
                            <div class="invalid-feedback">
                                {{ $errors->first('requirment') }}
                            </div>
                        @enderror
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