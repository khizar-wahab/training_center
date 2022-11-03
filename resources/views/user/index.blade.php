@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex gap-4 p-4 justify-content-center">
        
        @if(auth()->guard('web')->user()->type==1)
            <a href="{{ route('user.courses') }}" class="btn btn-primary">أضف وظائف</a>
            <a href="{{ route('company.profile') }}" class="btn btn-primary">ملف الشركة</a>        
        @else
            <a href="{{ route('user.courses') }}" class="btn btn-primary">التسجيل في الدورات وورش العمل</a>
            <a class="btn btn-primary">التقديم لوظيفة</a>
        @endif
    </div>
</div>
@endsection