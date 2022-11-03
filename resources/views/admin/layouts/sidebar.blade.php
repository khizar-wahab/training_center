
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Admin Panel</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->


</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item" href="{{ route('adminUser.index') }}">
        <i class="bi bi-people"></i><span>User</span>
      </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item" href="{{ route('adminCourse.index') }}">
        <i class="bi bi-book"></i><span>Courses</span>
      </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item" href="{{ route('admin.profile') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed sidebar-item" href="{{ route('admin.logout') }}">
        <i class="bi bi-person"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Profile Logout Nav -->

  </ul>

</aside><!-- End Sidebar-->
