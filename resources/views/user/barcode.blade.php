@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex gap-4 p-4">
        <a class="btn btn-primary">Enroll to Courses and Workshops</a>
        <a class="btn btn-primary">Apply for a Job</a>
    </div>
    @php
    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
@endphp
<div class="row mb-3 justify-content-center">
    <div class="col">
        <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode(auth()->user()->barcode->number, $generatorPNG::TYPE_CODE_128)) }}" downloadable>
    </div>
</div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('user.dashboard') }}"> Go To Dashboard</a>

        </div>
    </div>
</div>
@endsection