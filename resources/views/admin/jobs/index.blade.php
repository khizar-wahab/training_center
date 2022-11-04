@extends('admin.layouts.app')

@push('title')
Admin | Jobs
@endpush

@section('content')

<div class="row">
  {{-- sidebar --}}
  <div class="col-2 sidebar-parent">
    @include('admin.layouts.sidebar')
  </div>
  {{-- main content --}}
  <div class="col-xl-10 col-sm-12">

    <div class="container px-4 pt-1 pb-3 mt-5">

      <div class="card mt-5 pt-4 pb-4">
        <div class="row">
          <div class="col-lg-10">
            <div class="card-header">
              <h5 class="card-title">Jobs</h5>
            </div>
          </div>
          <div class="col-lg-12">
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show ms-5 me-4" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show ms-5 me-4" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          </div>
        </div>
        <div class="card-body">
          <!-- Default Table -->
          <table class="table table-responsive-md">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Last Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jobs as $i => $job)
              <tr>
                <th>{{ $i + 1 }}</th>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->type }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($job->last_date)->format('M j Y') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @push('scripts')

    @endpush

    @push('scripts')

    <script>
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