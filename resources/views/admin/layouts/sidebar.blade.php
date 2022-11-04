
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center justify-content-between">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ url('/admin/dashboard') }}" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Admin Panel</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div>
    
    @if (session()->has('alert'))
        
    <div class="custom-alert bg-success rounded-1 text-white px-3 py-2 mx-3">
      <i class="bi bi-check-circle"></i>&nbsp {{ session('alert') }}
    </div>

    @endif
    
    @if (session()->has('error'))
        
    <div class="custom-alert bg-danger rounded-1 text-white px-3 py-2 mx-3">
      <i class="bi bi-exclamation-circle"></i>&nbsp {{ session('error') }}
    </div>

    @endif

  </div>

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item {{ Route::is('admin.dashboard')? 'active': ''}}" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link sidebar-item {{ Route::is('adminUser.*')? 'active': 'collapsed'}}" href="{{ route('adminUser.index') }}">
        <i class="bi bi-people"></i><span>User</span>
      </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link sidebar-item {{ Route::is('adminCourse.*')? 'active ddd': 'collapsed'}}" href="{{ route('adminCourse.index') }}">
        <i class="bi bi-book"></i><span>Courses</span>
      </a>
    </li><!-- End Components Nav -->
    
    <li class="nav-item">
      <a class="nav-link sidebar-item {{ Route::is('admin-companies.*')? 'active': 'collapsed'}}" href="{{ route('admin-companies.view') }}">
        <i class="bi bi-bank2"></i><span>Company</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link sidebar-item {{ Route::is('adminTicket.*')? 'active': 'collapsed'}}" href="{{ route('adminTicket.index') }}">
        <i class="bi bi-cash"></i><span>Tickets</span>
      </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link sidebar-item {{ Route::is('admin.jobs.*')? 'active': 'collapsed'}}" href="{{ route('admin.jobs.index') }}">
        <i class="bi bi-cash"></i><span>Jobs</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link sidebar-item {{ Route::is('admin.profile')? 'active': 'collapsed'}}" href="{{ route('admin.profile') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item" href="{{ route('admin.logout') }}">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Profile Logout Nav -->

  </ul>

</aside><!-- End Sidebar-->
