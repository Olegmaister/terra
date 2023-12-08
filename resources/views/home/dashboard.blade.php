@extends('layout.layout')

@section('content')
    <div class="row">
        @foreach ($employees as $employee)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($employee->profile_image)
                        <img src="{{ asset('storage/' . $employee->profile_image) }}" class="card-img-top img-fluid"
                             alt="Employee Image">
                    @else
                        <img src="{{ asset('placeholder_image.jpg') }}" class="card-img-top img-fluid"
                             alt="Placeholder Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                        <p class="card-text">{{ $employee->email }}</p>
                        <p class="card-text">
                            @if ($employee->profession)
                                {{ $employee->profession->name }}
                            @else
                                No Profession
                            @endif
                        </p>
                    </div>

                    <div class="card">
                        <p style="padding: 10px">
                            {{ $employee->description }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $employees->links() }}
@endsection
