@extends('layout.layout')

@section('content')

    <div class="card-body">
        <form action="{{ route('positions.update', $position->uuid) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <h3 class="text-center">Update Position</h3>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $position->name ?? old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $position->description ?? old('description') }}">
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
                                            <option value="{{ $department['id'] }}" class="@if($position->department_id == $department['id'])selected @endif" >
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


