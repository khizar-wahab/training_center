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
    <div class="col-xl-10 col-sm-12">

        <!-- Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                        <h2 class="text-center text-dark mt-4">Admin Profile</h2>
                    <div class="modal-body">
                        <form class="px-5 py-4" action="{{ route('admin.profile.update') }}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name:</label>
                              <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email:</label>
                              <input type="email" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Current Password</label>
                              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">New Password (optioanl)</label>
                              <input type="password" class="form-control" name="nPassword" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Confirm Password (optioanl)</label>
                              <input type="password" class="form-control" name="cPassword" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary rounded">Submit</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
         <!--  -->

        <div class="container">
            <form action="{{ route('adminCourse.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white px-5 py-5 card" style="margin-top: 200px">
                @csrf
                <h1 class="text-secondary text-center">Admin Profile</h1>
                <div class="mb-4">
                    <input type="text" name="name" id="admin-profile-name"
                        value="{{ Auth::guard('admin')->user()->name }}" placeholder="Name"
                        class="form-control border-left-0 border-right-0 border-top-0" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled>
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4">
                    <input type="text" name="email" value="{{ Auth::guard('admin')->user()->email }}"
                        placeholder="Email" class="form-control border-left-0 border-right-0 border-top-0"
                        id="admin-profile-email" aria-describedby="emailHelp" disabled>
                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4">
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                          <div class="input-group-text border-left-0 border-right-0 border-top-0"><i class="bi bi-eye" id="admin-profile-toggle-password"></i></div>
                          <input type="password" value="{{ session('admin_password') }}" class="form-control border-left-0 border-right-0 border-top-0" id="admin-profile-password" placeholder="Username" disabled>
                        </div>
                    <span class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
            </form>

            <button  class="btn btn-primary rounded" id="admin-profile-modal" data-bs-toggle="modal" data-bs-target="#profileModal">Edit Profile</button>

        </div>

    </div>
</div>
</div>

@push('scripts')

<script>
    $(".sidebar-item:eq(3)").removeClass('collapsed');
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