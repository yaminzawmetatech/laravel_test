@extends('layout.layout')

@section('content')
    <div class="card-body">
        <form action="{{ route('departments.update', $department->id) }}" method="post">
            @csrf
            @method("PUT")

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <h3 class="text-center">Update Department</h3>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $department->name ?? old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $department->description ?? old('description') }}">
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>
