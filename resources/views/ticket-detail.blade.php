@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                <h2 class="mb-4">تفاصيل التذكرة</h2>
                <div class="form-group">
                    <label>عنوان الدورة</label>
                    <h3>
                        {{ $ticket->course->title ?? ' --- ' }}
                    </h3>
                </div>

                <div class="form-group">
                    <label>مقدم الدورة التدريبية</label>
                    <h3>{{ $ticket->course->traiPro ?? ' --- ' }}</h3>
                </div>

                <div class="form-group">
                    <label>اسم االمستخدم</label>
                    <h3>{{ $ticket->user->name ?? ' --- ' }}</h3>
                </div>

                <div class="form-group">
                    <label>البريد الالكتروني للمستخدم</label>
                    <h3>{{ $ticket->user->email ?? ' --- ' }}</h3>
                </div>

                <div class="form-group">
                    <label title="Enter phone">هاتف المستخدم</label>
                    <h3>{{ $ticket->user->phone ?? ' --- ' }}</h3>
                </div>

                <div class="form-group">
                    <label>تاريخ التسجيل</label>
                    <h3>{{ \Illuminate\Support\carbon::parse($ticket->created_at)->format('M d Y') }}</h3>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection