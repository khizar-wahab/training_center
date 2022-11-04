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
          <div class="col-lg-2">
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Add Jobs</a>
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
                <th scope="col">Id</th>
                <th scope="col">Company Name</th>
                <th scope="col">Company Owner Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">View</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($companies = [] as $company)
              <tr>
                <th>{{ $company->id }}</th>
                <td>{{ $company->name }}</td>
                <td>{{ $company->user_name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone }}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-@php if($company->status==1){ echo "success"; }else{ echo "danger" ; } @endphp dropdown-toggle rounded"
                      type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      @php
                      if($company->status==1){
                      echo "Active";
                      }else{
                      echo "Deactive";
                      }
                      @endphp
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="{{ route('admin-companies.status', ['id'=>$company->id,'status'=>1]) }}">Active</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('admin-companies.status', ['id'=>$company->id,'status'=>0]) }}">Dective</a>
                      </li>
                      </form>
                      </li>
                    </ul>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle rounded" type="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('admin-companies.edit', $company->id) }}">Edit</a></li>
                      <li>
                        <form action="{{ route('admin-companies.destroy', $company->id) }}" method="POST">
                          <input name="_method" type="hidden" value="DELETE">
                          {{ csrf_field() }}
                      <li><a class="dropdown-item" type="submit" href="#"><button type="submit"
                            style="border: none; background:none;  position: relative; right:6px;">Delete</button></a>
                      </li> {{-- delete --}}
                      </form>
                      </li>
                    </ul>
                  </div>
                </td>
                <td>
                  <a href="{{  route('admin-companies.viewdetail',$company->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i> &nbsp;View</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @push('scripts')

    <script>
      $(".nav-link:eq(2)").addClass('active');
    </script>

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