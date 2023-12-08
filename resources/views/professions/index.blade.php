@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Profession List</h2>
        <a href="{{ route('professions.create') }}" class="btn btn-primary">Create New Profession</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($professions as $profession)
            <tr>
                <td>{{ $profession->id }}</td>
                <td>{{ $profession->name }}</td>
                <td>
                    <a href="{{ route('professions.edit', $profession->id) }}" class="btn btn-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('professions.destroy', $profession->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $professions->links() }}
@endsection

