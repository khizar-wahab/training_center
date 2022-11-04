@extends('admin.layouts.app')

@push('title')
Admin dashboard
@endpush

@section('content')

@php
    
    use App\Models\User;
    use App\Models\Course;
    use App\Models\Ticket;

    $users = User::count();
    $courses = Course::count();
    $tickets = Ticket::count();

@endphp

<div class="row">
    {{-- sidebar --}}
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-xl-10 col-sm-12 mt-5">
        
        <div class="container mt-4">

              <div class="dashboard">
                <h5 class="card-title">Dashboard</h5>
                <div class="row">

                    <div class="col-xxl-4 col-md-6">

                        <div class="card info-card sales-card">
                          <div class="card-body">
                            <h5 class="card-title">Total <span>| Users</span></h5>
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-user"></i>
                              </div>
                              <div class="ps-3">
                                <h6>@if ($users < 10)
                                  0{{ $users }}
                                @else
                                    {{ $users }}
                                @endif</h6>
                                <a href="{{ route('adminUser.index') }}" class="admin-table-links-2">
                                    <span class="small pt-2 ps-1 fw-bold">Details</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                    <div class="col-xxl-4 col-md-6">

                        <div class="card info-card sales-card">
                          <div class="card-body">
                            <h5 class="card-title">Total <span>| Courses</span></h5>
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-book"></i>
                              </div>
                              <div class="ps-3">
                                <h6>@if ($courses < 10)
                                    0{{ $courses }}
                                @else
                                    {{ $courses }}
                                @endif</h6>
                                <a href="{{ route('adminCourse.index') }}" class="admin-table-links-2">
                                    <span class="small pt-2 ps-1 fw-bold">Details</span>
                                </a>
                              </div>
                            </div>
                          </div>
          
                        </div>
                        
                      </div>
                      
                    <div class="col-xxl-4 col-md-6">

                        <div class="card info-card sales-card">
                          <div class="card-body">
                            <h5 class="card-title">Total <span>| Tickets</span></h5>
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-purchase-tag"></i>
                              </div>
                              <div class="ps-3">
                                <h6>@if ($tickets < 10)
                                    0{{ $tickets }}
                                @else
                                    {{ $tickets }}
                                @endif</h6>
                                <a href="{{ route('adminTicket.index') }}" class="admin-table-links-2">
                                    <span class="small pt-2 ps-1 fw-bold">Details</span>
                                </a>
                              </div>
                            </div>
                          </div>
          
                        </div>

                      </div>

                </div>

              </div>

        </div>

    </div>
</div>

@push('scripts')
    
    <script>
        $(".sidebar-item:eq(0)").removeClass('collapsed');
    </script>

@endpush

@endsection