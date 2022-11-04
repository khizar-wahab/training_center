@extends('admin.layouts.app')

@push('title')
Admin | Company Detail
@endpush

@section('content')

<div class="row">
  {{-- sidebar --}}
  <div class="col-2">
    @include('admin.layouts.sidebar')
  </div>
  {{-- main content --}}
  <div class="col-xl-10 col-sm-12 mt-5">

    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
          <h5>Company Detail</h5>
        </div>
        <img src="{{ asset('storage/'.$company->image ?? '') }}" class="d-block" style="height: 450px">
        <div class="card-body">
          <h5 class="card-title">{{ $company->name }}</h5>
          <p class="card-text">
            Email: {{ $company->email }} <br>
            Owner: {{ $company->user_name }}<br>
            Phone: {{ $company->phone }}
          </p>
          <p class="card-text">
            Address: {{ $company->street .', '.$company->city .', '.$company->state .', '. $company->address}}
          </p>
          <p class="card-text">
            {{ $company->description }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')

<script>
  $(".sidebar-item:eq(2)").removeClass('collapsed');
        var elem = $('.custom-alert:eq(0)');
        console.log(elem.html());
        if(elem.html() != ""){
            setTimeout(() => {
                elem.fadeOut("slow");
            }, 1800);
        }
</script>

@endpush

@endsection