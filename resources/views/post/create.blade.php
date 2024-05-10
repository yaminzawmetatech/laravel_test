@extends('layout.layout')

@section('content')

    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <h3 class="text-center">Create Post</h3>
                    </div>
                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="content" class="col-md-4 col-form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Submit">
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>


