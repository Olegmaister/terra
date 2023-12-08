@extends('layout.layout')

@section('content')

    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        @if ($errors->has('email') || $errors->has('password'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

@endsection
