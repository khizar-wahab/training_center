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
<div class="container py-4">
    <div class="mb-5">
        <a class="btn btn-primary" href="{{ route('user.dashboard') }}">الذهاب إلى لوحة القيادة</a>
        <a class="btn btn-primary" href="{{ route('user.barcode') }}">مشاهدة ملف Qrcode</a>
    </div>
    <h2 class="text-center mb-4">Tickets</h2>
    <div class="row">
        @forelse ($tickets as $ticket)
            <div class="course-wrap col-12 col-sm-2 col-md-3 col-lg-4 mb-4">
                <div class="card w-100">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $ticket->course->title }}</h3>
                        <div class="barcode d-flex justify-content-center p-5">
                            <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(100)->generate($ticket->qrcode_number)) }}" download>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-warning" href="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate($ticket->qrcode_number)) }}" download>تنزيل Qrcode</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h3>لم يتم العثور على تذاكر!</h3>
            </div>
        @endforelse
    </div>
</div>
@endsection