@extends('layout.layout')

@section('content')

    <div class="card">
        <div class="card-header">Department List</div>
        <div class="card-body">
            <a href="{{ route('departments.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Department</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('departments.show', $department->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Department Found!</strong>
                                </span>
                    </td>
                @endforelse
                </tbody>
            </table>
            {{ $departments->links() }}

        </div>
    </div>


