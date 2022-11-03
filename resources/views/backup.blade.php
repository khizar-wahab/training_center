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
                <h1 class="text-secondary text-center">Edit Course</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title:</label>
                    <input type="text" name="title" @if(isset($course)) value="{{ $course->title }}" @endif value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Day:</label>
                            <input type="text" name="day" @if(isset($course)) value="{{ $course->day }}" @endif value="{{ old('day') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger">
                                @error('day')
                                    {{ $message }}
                                @enderror
                            </span>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date:</label>
                            <input type="date" name="date" @if(isset($course)) value="{{ $course->date }}" @endif value="{{ old('date') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </span>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Time:</label>
                            <input type="time" name="time" @if(isset($course)) value="{{ $course->time }}" @endif value="{{ old('time') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger">
                                @error('time')
                                    {{ $message }}
                                @enderror
                            </span>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gender:</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input rounded-circle" @if(isset($course) && $course->gender == "Male") checked @endif type="radio" name="gender" value="Male" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Male
                                        </label>
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input rounded-circle" @if(isset($course) && $course->gender == "Female") checked @endif type="radio" name="gender" value="Female" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Female
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <span class="text-danger">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Training provider:</label>
                            <input type="text" name="trainingProvider" @if(isset($course)) value="{{ $course->traiPro }}" @endif value="{{ old('trainingProvider') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger">
                                @error('trainingProvider')
                                    {{ $message }}
                                @enderror
                            </span>
                          </div>
                    </div>
                  </div>
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