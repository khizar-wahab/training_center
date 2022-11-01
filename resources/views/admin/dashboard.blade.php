@extends('admin.layouts.app')

@push('title')
Admin dashboard
@endpush

@section('content')

<div class="row">
    {{-- sidebar --}}
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-10">
        
    </div>
</div>

@push('scripts')
    
    <script>
        $(".nav-link:eq(0)").addClass('active');
    </script>

@endpush

@endsection