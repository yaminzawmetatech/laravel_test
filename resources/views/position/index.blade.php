@extends('layout.layout')

@section('content')

    <div class="card">
        <div class="card-header">Position List</div>
        <div class="card-body">
            <a href="{{ route('positions.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Position</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->name }}</td>
                        <td>{{ $position->description }}</td>
                        <td>{{ $position->department->name }}</td>
                        <td>
                            <form action="{{ route('positions.destroy', $position->uuid) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('positions.show', $position->uuid) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                <a href="{{ route('positions.edit', $position->uuid) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Position Found!</strong>
                                </span>
                    </td>
                @endforelse
                </tbody>
            </table>
            {{ $positions->links() }}

        </div>
    </div>


