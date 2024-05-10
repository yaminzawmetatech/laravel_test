@extends('layout.layout')

@section('content')

    <div class="card-body">
        <form action="{{ route('positions.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <h3 class="text-center">Create Position</h3>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                                <div class="form-floating">
                                    <select id="department_id" name="department_id"
                                            class="select2-input form-select @error('department_id') is-invalid @enderror"
                                            style="width: 100%" required>
                                        @foreach($departments as $department)
                                            <option value="{{ $department['id'] }}">
                                                {{ $department['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="department_id" class="form-label">Department</label>
                                </div>
                                @if($errors->has('department_id'))
                                    <span
                                        class="text-danger small font-weight-bolder">{{ $errors->first('department_id') }}</span>
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


