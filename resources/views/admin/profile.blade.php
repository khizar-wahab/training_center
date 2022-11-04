@extends('admin.layouts.app')

@push('title')
Admin Profile
@endpush

@section('content')

<div class="row">
    {{-- sidebar --}}
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-xl-10 col-sm-12 mt-5">

        <div class="container">

            <section class="section profile mt-5 pt-5">
                <div class="row mt-5 pt-5">
                  <div class="col-xl-12">
          
                    <div class="card">
                      <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
          
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Overview</button>
                          </li>
          
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                          </li>
          
          
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">Change Password</button>
                          </li>
          
                        </ul>
                        <div class="tab-content pt-2">
          
                          <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
          
                            <h5 class="card-title">Profile Details</h5>
          
                            <div class="row">
                              <div class="col-lg-3 col-md-4 label ">Name</div>
                              <div class="col-lg-9 col-md-8">{{ Auth::guard('admin')->user()->name }}</div>
                            </div>
          
                            <div class="row">
                              <div class="col-lg-3 col-md-4 label">Email</div>
                              <div class="col-lg-9 col-md-8">{{ Auth::guard('admin')->user()->email }}</div>
                            </div>
          
                            <div class="row">
                              <div class="col-lg-3 col-md-4 label">Last edited</div>
                              <div class="col-lg-9 col-md-8">{{ \Illuminate\Support\carbon::parse(Auth::guard('admin')->user()->updated_at)->format('M d Y') }}</div>
                            </div>
          
                          </div>
          
                          <div class="tab-pane fade profile-edit" id="profile-edit" role="tabpanel">
          
                            <!-- Profile Edit Form -->
                            <form action="{{ route('admin.profile.update') }}" method="post">

                                @csrf

                                <h5 class="card-title">Edit Profile</h5>
            
                                <div class="row mb-3">
                                    <label for="name" class="col-md-2 col-lg-2 col-form-label">Name</label>
                                    <div class="col-md-10 col-lg-10">
                                    <input name="name" type="text" class="form-control" id="name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-2 col-lg-2 col-form-label">Email</label>
                                    <div class="col-md-10 col-lg-10">
                                    <input name="email" type="email" class="form-control" id="Email">
                                    </div>
                                </div>
          
          
                              <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                              </div>
                            </form><!-- End Profile Edit Form -->
          
                          </div>
          
                          <div class="tab-pane fade pt-3" id="profile-settings" role="tabpanel">
          
                          </div>
          
                          <div class="tab-pane fade" id="profile-change-password" role="tabpanel">
                            <!-- Change Password Form -->
                            <form action="{{ route('admin.profile.changePass') }}" method="post">

                                @csrf

                                <h5 class="card-title">Change Password</h5>
          
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                    <input name="password" type="password" class="form-control" id="currentPassword">
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                    <input name="nPassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                    <input name="cPassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>
            
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->
          
                          </div>
          
                        </div><!-- End Bordered Tabs -->
          
                      </div>
                    </div>
          
                  </div>
                </div>
              </section>

        </div>

    </div>
</div>
</div>

@push('scripts')

<script>
    $(".sidebar-item:eq(5)").removeClass('collapsed');
    var elem = $('.custom-alert:eq(0)');
    console.log(elem.html());
    if(elem.html() != ""){
        setTimeout(() => {
            elem.fadeOut("slow");
        }, 1800);
    }

    var name = $("#admin-profile-name").val();
    var email = $("#admin-profile-email").val();
    var password = $("#admin-profile-password").val();

    $("#admin-profile-name").on("keyup", function(e){
        e.target.disabled = true;
        e.target.value = name;
    });

    $("#admin-profile-email").on("keyup", function(e){
        e.target.disabled = true;
        e.target.value = email;
    });

    $("#admin-profile-password").on("keyup", function(e){
        e.target.disabled = true;
        e.target.value = password;
    });

    $("#admin-profile-modal").on('click', function(e){
        e.preventDefault();
    });

    $("#admin-profile-toggle-password").on("click", function(e){
        var toggleBtn = $("#admin-profile-toggle-password");
        var input = $("#admin-profile-password");
        if(toggleBtn.hasClass("bi-eye")){
            toggleBtn.removeClass("bi-eye");
            toggleBtn.addClass("bi-eye-slash");
            input.attr("type", "text");
        }else{
            toggleBtn.addClass("bi-eye");
            toggleBtn.removeClass("bi-eye-slash");
            input.attr("type", "password");
        }
    });

</script>

@endpush

@endsection