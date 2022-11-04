@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card border-0">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <img src="{{ asset('storage/'.($company->image ?? '')) }}" alt="" class="img-thumbnail h-100">
        </div>
        <div class="col">
          <h1>{{ $company->name ?? '' }}</h1>
          <p class="text-justify mt-4">{{ $company->description ?? '' }}</p>
          <div class="clearfix"></div>
          <p>{{ $company->street ?? '' }}</p>
          <p>{{ $company->city ?? '' }}</p>
          <p>{{ $company->state ?? '' }}</p>
          <p>{{ $company->country ?? '' }}</p>
          <a href="{{ route('update-company',$company->id ?? '') }}" class="btn btn-primary">تحديث الملف التعريفي للشركة</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection