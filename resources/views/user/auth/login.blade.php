@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                @if ($message = session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($message = session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label title="Enter email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="d-flex justify-content-between" title="Password">
                            <span>كلمة المرور</span>
                            <span>
                                <a href="{{ route('user.password.request') }}">هل نسيت كلمة السر؟</a>
                            </span>
                        </label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" title="Login">تسجيل الدخول</button>
                </form>
                <p class="mt-4">ليس لديك حساب؟ <a href="{{ url('/') }}">سجل الان</a></p>
            </div>
        </div>
    </div>
</div>
@endsection