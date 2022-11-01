@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex gap-4 p-4">
        <a href="{{ route('user.courses') }}" class="btn btn-primary">Enroll to Courses and Workshops</a>
        <a class="btn btn-primary">Apply for a Job</a>
    </div>
    <h1>Welcome to Courses</h1>
</div>
@endsection