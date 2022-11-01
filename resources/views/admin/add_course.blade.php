@extends('admin.layouts.app')

@push('title')
Admin Add Courses
@endpush

@section('content')

<div class="row">
    {{-- sidebar --}}
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-10">
        <div class="container">
            <form action="{{ route('adminCourse.store') }}" method="post" class="bg-white px-5 pt-3 pb-4 mt-5 border">
                @csrf
                <h1 class="text-secondary text-center">Add Course</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title:</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 110px !important;"></textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <button class="btn btn-primary rounded">Submit</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    
    <script>
        $(".nav-link:eq(2)").addClass('active');
    </script>

@endpush

@endsection