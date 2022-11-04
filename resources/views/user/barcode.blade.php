@extends('layouts.app')

@section('content')
<style>
    body {
        margin-bottom: 230px;
    }
    .footer-area {
        position: fixed;
        width: 100%;
        bottom: 0;
    }
</style>
<div class="container">
    <div class="mb-5">
        <a class="btn btn-primary" href="{{ route('user.dashboard') }}">الذهاب إلى لوحة القيادة</a>
        <a class="btn btn-primary" href="{{ route('user.tickets.index') }}">عرض التذاكر</a>
    </div>
    <div class="barcode d-flex justify-content-center mb-5 p-5">
        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate(auth()->user()->barcode->number)) }}" download>
    </div>
    <div class="text-center">
        <a class="btn btn-warning" href="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate(auth()->user()->barcode->number)) }}" download>تنزيل Qrcode</a>
    </div>
</div>
@endsection