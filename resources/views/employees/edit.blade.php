@extends('layout.admin')

@section('content')
    <h2>Edit Employee</h2>

    <div class="text-center mt-4">
        @if ($employee->profile_image)
            <img src="{{ asset('storage/' . $employee->profile_image) }}" alt="Current Profile Image" class="img-thumbnail" style="max-width: 200px;">
        @else
            <p>No image available</p>
        @endif
    </div>

    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="profile_image">Profile Image:</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
        </div>

        <div class="form-group">
            <label for="profession_id">Profession:</label>
            <select class="form-control" id="profession_id" name="profession_id">
                @foreach($professions as $profession)
                    <option value="{{ $profession->id }}" {{ $employee->profession_id == $profession->id ? 'selected' : '' }}>
                        {{ $profession->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">
                {{ $employee->description }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection

