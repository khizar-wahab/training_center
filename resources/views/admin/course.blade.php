@extends('admin.layouts.app')

@push('title')
Admin Courses
@endpush

@section('content')

<div class="row">
    {{-- sidebar --}}
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-10">
        <button class="btn btn-primary">Add Course</button>
    </div>
</div>

@push('scripts')
    
    <script>
        $(".nav-link:eq(2)").addClass('active');
    </script>

@endpush

@endsection