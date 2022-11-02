@extends('admin.layouts.app')

@push('title')
Admin Add Course
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
                      <li class="breadcrumb-item active" aria-current="page">Add Course</li>
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
            <form action="{{ route('adminCourse.store') }}" method="post" enctype="multipart/form-data" class="bg-white px-5 pt-3 pb-4 mt-5 border">
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
                  <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Day:</label>
                            <input type="text" name="day" value="{{ old('day') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                            <input type="date" name="date" value="{{ old('date') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                            <input type="time" name="time" value="{{ old('time') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                        <input class="form-check-input rounded-circle" type="radio" name="gender" value="Male" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Male
                                        </label>
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input rounded-circle" type="radio" name="gender" value="Female" id="flexRadioDefault1">
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
                            <input type="text" name="trainingProvider" value="{{ old('trainingProvider') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
    </script>

@endpush

@endsection