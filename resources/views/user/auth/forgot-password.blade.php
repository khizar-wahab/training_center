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
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
                <form action="{{ route('user.password.email') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>أدخل عنوان بريدك الالكتروني</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">إرسال بريد إلكتروني مخصص للطوارئ</button>
                </form>
                <p class="mt-4"><a href="{{ route('user.login') }}">تسجيل الدخول</a></p>
            </div>
        </div>
    </div>
</div>
@endsection