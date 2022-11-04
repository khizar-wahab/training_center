@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-5">
        <a class="btn btn-primary" href="{{ route('user.barcode') }}">مشاهدة ملف Qrcode</a>
        <a class="btn btn-primary" href="{{ route('user.tickets.index') }}">عرض التذاكر</a>
    </div>
    <div class="d-flex gap-4 p-4 justify-content-center">
        @if(auth()->guard('web')->user()->type==1)
            <a href="{{ route('user.courses') }}" class="btn btn-primary">أضف وظائف</a>
            <a href="{{ route('company.profile') }}" class="btn btn-primary">ملف الشركة</a>        
        @else
            <a href="{{ route('user.courses') }}" class="btn btn-primary mx-4">التسجيل في الدورات وورش العمل</a>
            <a href="{{ route('user.jobs') }}" class="btn btn-primary mx-4">التقديم لوظيفة</a>
        @endif
    </div>
</div>
@endsection