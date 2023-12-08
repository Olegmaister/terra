@extends('layout.admin')

@section('content')
    <h2>Edit Profession</h2>

    <form method="POST" action="{{ route('professions.update', $profession->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Profession Name:</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ $profession->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection

