<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Your Page Title</title>
</head>
<body class="d-flex flex-column min-vh-100">

<div class="container-fluid flex-grow-1">
    <div class="row bg-primary text-white p-2">
        <div class="col-md-3"></div>
        <div class="col-md-6"></div>
        <div class="col-md-3 text-right">
            @auth
                <span class="mr-2">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit" style="color: white" class="btn btn-link">Logout</button>
                </form>
            @endauth
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 bg-light d-flex flex-column">
            <div class="list-group flex-grow-1">
                <a href="{{ route('employees.index') }}" class="list-group-item list-group-item-action">Employees</a>
                <a href="{{ route('professions.index') }}"
                   class="list-group-item list-group-item-action">Professions</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="container mt-4">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<footer class="footer py-3 bg-light">
    <div class="container">
        <span class="text-muted">Your Footer Content Here</span>
    </div>
</footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
