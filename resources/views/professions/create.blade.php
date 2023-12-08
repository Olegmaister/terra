@extends('layout.admin')

@section('content')
    <h2>Create New Profession</h2>

    <form method="POST" action="{{ route('professions.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Profession Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
