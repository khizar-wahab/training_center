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
    <div class="col-xl-10 col-sm-12 mt-5">
        
        <div class="container mt-5">


            <div class="card-body mt-5 bg-white">
                <h5 class="card-title">Edit User</h5>
  
                <!-- Vertical Form -->
                <form class="row g-3" action="{{ route('adminUser.update', $id) }}"  method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field("PUT") }}
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" name="name" @if(isset($user)) value="{{ $user->name }}" @endif value="{{ old('name') }}" class="form-control" id="inputNanme4">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" @if(isset($user)) value="{{ $user->email }}" @endif value="{{ old('email') }}" class="form-control" id="inputEmail4">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Phone</label>
                    <input type="text" name="phone" @if(isset($user)) value="{{ $user->phone }}" @endif value="{{ old('phone') }}" class="form-control" id="inputEmail4">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Confrim Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="inputPassword4">
                    <span class="text-danger">
                        @error('password_confirmation')
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
        var elem = $('.custom-alert:eq(0)');
        console.log(elem.html());
        if(elem.html() != ""){
            setTimeout(() => {
                elem.fadeOut("slow");
            }, 1800);
        }
    </script>

@endpush