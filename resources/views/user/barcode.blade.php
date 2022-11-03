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
    </div>
    {{-- @php
    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    @endphp --}}
    <div class="barcode d-flex justify-content-center mb-5 p-5">
        {{-- <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode(auth()->user()->barcode->number, $generatorPNG::TYPE_CODE_128)) }}" download style="height: 50px;"> --}}
        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate(auth()->user()->barcode->number)) }}" download>
    </div>
    <div class="text-center">
        <a class="btn btn-warning" href="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate(auth()->user()->barcode->number)) }}" download>تحميل الباركود</a>
    </div>
</div>
@endsection