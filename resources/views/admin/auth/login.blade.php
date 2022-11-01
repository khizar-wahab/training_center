@extends('admin.layouts.app')

@push('title')
Admin login
@endpush

@section('content')

{{-- login form --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5 mt-4">

        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-7 col-lg-5">
            <div class="login-wrap p-4 p-md-5">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="bi bi-person" style="font-size: 45px;"></span>
                </div>
                <h3 class="text-center mb-4">Admin
                {{-- credentials error --}}
                @if (session()->has('error'))
                    <h6 class="text-center text-danger">{{ session('error') }}</h6>
                @endif
                {{--  --}}
                </h3>
                <form action="{{ route('admin.login') }}" method="post" class="login-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" name="email" placeholder="Email" @if(session()->has('ad_log_email')) value="{{ session('ad_log_email') }}" @else value="{{ old('email') }}" @endif>
                    </div>
                    <span class="text-danger ad-login-err">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" name="password" placeholder="Password" value="{{ old('password') }}">
                    </div>
                    <span class="text-danger ad-login-err">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="form-group">
                        <button type="submit"
                            class="form-control btn btn-primary rounded submit px-3">Login</button>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label text-primary" for="flexCheckChecked">
                          Remember me!
                        </label>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection