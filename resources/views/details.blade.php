@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <h3>
                        {{ $user->name ?? ' --- ' }}
                    </h3>
                </div>

                <div class="form-group">
                    <label title="Enter email">البريد الإلكتروني</label>
                    <h3>{{ $user->email ?? ' --- ' }}</h3>
                </div>

                <div class="form-group">
                    <label title="Enter phone">هاتف</label>
                    <h3>{{ $user->phone ?? ' --- ' }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection