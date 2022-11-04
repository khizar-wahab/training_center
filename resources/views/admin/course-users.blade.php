@extends('admin.layouts.app')

@push('title')
Admin Courses | {{ $course->title }} Users
@endpush

@section('content')

<style>
    @media print {
        #header, #sidebar, .export-btn {
            display: none !important;
        }

        .print {
            position: fixed;
            width: 100%;
            left: 0px;
            top: 0px;
        }        
    }
</style>

<div class="row">
    {{-- sidebar --}}
    <div class="col-2 sidebar-parent">
        @include('admin.layouts.sidebar')
    </div>
    {{-- main content --}}
    <div class="col-xl-10 col-sm-12">

        <div class="container px-4 pt-1 pb-3 mt-5">
            <div class="d-flex justify-content-end mt-5">
                <button class="btn btn-success export-btn" onclick="window.print()">Export</button>
            </div>
            <div class="card mt-5 pt-4 pb-4 print">
                <div class="card-body">
                    <h5 class="card-title">{{$course->title}}'s enrolled users</h5>

                  <!-- Default Table -->
                  <table class="table table-responsive-md">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Enroll Date</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($course->users as $i => $user)
                           
                       <tr>
                        <th>{{ $i + 1 }}</th>
                        <td><a href="{{ route('adminUser.edit', $user->id) }}">{{$user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \Illuminate\Support\carbon::parse($user->tickets()->where('course_id', $course->id)->first()->create_at)->format('M d Y') }}</td>
                    </tr>

                       @empty
                       <tr>
                        <td class="text-center" colspan="4">No enrolled users found</td>
                       </tr>
                       @endforelse
                    </tbody>
                  </table>
                  <!-- End Default Table Example -->
                </div>
              </div>

    </div>
</div>

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