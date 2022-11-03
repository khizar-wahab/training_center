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
    <div class="col-xl-10 col-sm-12 mt-5">
        
        <div class="container mt-5">

            <div class="card-body mt-5 bg-white py-5 px-5">
                <h3 class="text-center">Edit Course</h3>
  
                <!-- Vertical Form -->
                <form class="row g-3" action="{{ route('adminCourse.update', $id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field("PUT") }}
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title</label>
                    <input type="text" name="title" @if(isset($course)) value="{{ $course->title }}" @endif value="{{ old('title') }}" class="form-control" id="inputNanme4">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Day</label>
                    <input type="text" name="day" @if(isset($course)) value="{{ $course->day }}" @endif value="{{ old('day') }}" class="form-control" id="inputEmail4">
                    <span class="text-danger">
                        @error('day')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Date</label>
                    <input type="date" name="date" @if(isset($course)) value="{{ $course->date }}" @endif value="{{ old('date') }}" class="form-control" id="inputEmail4">
                    <span class="text-danger">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Time</label>
                    <input type="time" name="time" @if(isset($course)) value="{{ $course->time }}" @endif value="{{ old('time') }}" class="form-control" id="inputPassword4">
                    <span class="text-danger">
                        @error('time')
                            {{ $message }}
                        @enderror
                    </span>
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
                    <label for="inputPassword4" class="form-label">Training provider:</label>
                    <input type="text" name="trainingProvider" @if(isset($course)) value="{{ $course->traiPro }}" @endif value="{{ old('trainingProvider') }}" class="form-control" id="inputPassword4">
                    <span class="text-danger">
                        @error('trainingProvider')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form><!-- Vertical Form -->
  
              </div>

        </div>
    </div>
</div>

@push('scripts')
    
    <script>
       $(".sidebar-item:eq(2)").removeClass('collapsed');
        var elem = $('.custom-alert:eq(0)');
        console.log(elem.html());
        if(elem.html() != ""){
            setTimeout(() => {
                elem.fadeOut("slow");
            }, 1800);
        }
    </script>

@endpush

@endsection