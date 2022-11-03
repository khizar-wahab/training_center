@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card border-0">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <img src="{{ asset('storage/'.($company->image ?? '')) }}" alt="" style="height: 500px;width:500px">
        </div>
        <div class="col">
          <p>{{ $company->description ?? '' }}</p>
          <a href="{{ route('update-company',$company->id ?? '') }}" class="btn btn-primary">Update Company Profile</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection