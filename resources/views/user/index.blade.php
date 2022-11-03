@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-5">
        <a class="btn btn-primary" href="{{ route('user.barcode') }}">مشاهدة ملف Qrcode</a>
        <a class="btn btn-primary" href="{{ route('user.tickets.index') }}">عرض التذاكر</a>
    </div>
    <div class="d-flex gap-4 p-4 justify-content-center">
        <a href="{{ route('user.courses') }}" class="btn btn-primary mx-4">التسجيل في الدورات وورش العمل</a>
        <a href="{{ route('user.jobs') }}" class="btn btn-primary mx-4">التقديم لوظيفة</a>
    </div>
</div>
@endsection