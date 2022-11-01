@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex gap-4 p-4 justify-content-center">
        <a href="{{ route('user.courses') }}" class="btn btn-primary">التسجيل في الدورات وورش العمل</a>
        <a class="btn btn-primary">التقديم لوظيفة</a>
    </div>
</div>
@endsection