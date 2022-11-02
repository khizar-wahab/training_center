@extends('admin.layouts.app')

@push('title')
Admin Edit Course
@endpush

@section('content')

<div class="row">
    {{-- sidebar --}}
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-10">
        
        <div class="row">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('adminCourse.index') }}">Courses</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                    </ol>
                  </nav>
            </div>
            <div class="col-6 d-flex justify-content-end">
                @if (session()->has('alert'))
                    <div class="custom-alert alert bg-success text-light mx-4 mt-2">
                        <i class="bi bi-check-circle-fill"></i>&nbsp&nbsp{{ session('alert') }}
                    </div>                    
                @endif
            </div>
        </div>
        
        <div class="container">
            <form action="{{ route('adminCourse.update', $id) }}" method="post" enctype="multipart/form-data" class="bg-white px-5 pt-3 pb-4 mt-5 border">
                @csrf
                {{ method_field("PUT") }}
                <h1 class="text-secondary text-center">Add Course</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title:</label>
                    <input type="text" name="title" @if(isset($course)) value="{{ $course->title }}" @endif value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Duration:</label>
                    <input type="text" name="duration" value="{{ old('duration') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('duration')
                            {{ $message }}
                        @enderror
                    </span>
                  </div> --}}
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="edit-course-desc" style="height: 110px !important;"></textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Members:</label>
                    <select id="select" multiple>
                        <option value="best">Best</option>
                        <option value="select">Select</option>
                        <option value="ever">Ever</option>
                      </select>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                  </div> --}}
                  {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image:</label>
                    <input type="file" name="img" value="{{ old('img') }}" class="form-control file-input" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('img')
                            {{ $message }}
                        @enderror
                    </span>
                  </div> --}}
                  <button class="btn btn-primary rounded">Submit</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    
    <script>
        $(".nav-link:eq(2)").addClass('active');
        var elem = $('.custom-alert:eq(0)');
        console.log(elem.html());
        if(elem.html() != ""){
            setTimeout(() => {
                elem.fadeOut("slow");
            }, 1800);
        }

        $("#edit-course-desc").val("{{ $course->desc }}");
    </script>

@endpush
{{-- jquery multiselect --}}
{{-- @push('scripts')
    
    <script>
        setTimeout(function() {
        new SlimSelect({
          select: '#select'
            })
        }, 300)
        $(".ss-disabled:eq(0)").html("Select members");
    </script>

@endpush --}}

@endsection