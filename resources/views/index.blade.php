@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                <form action="{{ route('user.register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label title="Enter name">الاسم الكامل</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label title="Enter email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label title="Enter phone">هاتف</label>
                        <input type="text" class="form-control" name="phone">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label title="Enter password (8-16)">كلمة المرور</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label title="Confirm password">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-success">يسجل</button>
                </form>
                <p class="mt-4">هل لديك حساب؟ <a href="{{ route('user.login') }}">تسجيل الدخول من هنا</a></p>
            </div>
        </div>
    </div>
</div>
@endsection