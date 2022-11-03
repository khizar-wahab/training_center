@extends('admin.layouts.app')

@push('title')
Admin Edit User
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
                      <li class="breadcrumb-item"><a href="{{ route('adminUser.index') }}">User</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
            <form action="{{ route('adminUser.update', $id) }}" method="post" enctype="multipart/form-data" class="bg-white px-5 pt-3 pb-4 mt-5 border">
                @csrf
                {{ method_field("PUT") }}
                <h1 class="text-secondary text-center">Edit User</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                    <input type="text" name="name" @if(isset($user)) value="{{ $user->name }}" @endif value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email:</label>
                    <input type="email" name="email" @if(isset($user)) value="{{ $user->email }}" @endif value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone:</label>
                    <input type="text" name="phone" @if(isset($user)) value="{{ $user->phone }}" @endif value="{{ old('phone') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger">
                        @error('password_confirmation')
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

        $(".nav-link:eq(1)").addClass('active');
        var elem = $('.custom-alert:eq(0)');
        console.log(elem.html());
        if(elem.html() != ""){
            setTimeout(() => {
                elem.fadeOut("slow");
            }, 1800);
        }

    </script>