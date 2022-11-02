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
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>كلمة المرور</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection