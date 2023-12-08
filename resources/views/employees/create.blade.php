@extends('layout.admin')

@section('content')
    <h2>Create New Employee</h2>

    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="profile_image">Profile Image:</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="profession_id">Profession:</label>
            <select class="form-control" id="profession_id" name="profession_id">
                @foreach($professions as $profession)
                    <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
