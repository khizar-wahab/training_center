@extends('admin.layouts.app')

@push('title')
Admin Courses
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
                <div class="card-body">
                    <h5 class="card-title">Courses</h5>

                    <!-- Default Table -->
                    <div class="table-responsive-md">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Day</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Training Provider</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <th>{{ $course->id }}</th>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->day }}</td>
                                <td>{{ $course->date }}</td>
                                <td>{{ $course->time }}</td>
                                <td>{{ $course->gender }}</td>
                                <td>{{ $course->traiPro }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle rounded" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.courses.users', $course->id) }}">View Enrolled Users</a></li>
                                            <li>
                                            <li><a class="dropdown-item admin-table-links"
                                                    href="{{ route('adminCourse.edit', $course->id) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('adminCourse.destroy', $course->id) }}"
                                                    method="POST">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                            <li><button type="submit" class="dropdown-item">Delete</button>
                                            </li> {{-- delete --}}
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    @if ($courses->links() !== "")
                    {{ $courses->links() }}
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{ route('adminCourse.create') }}">
                        <button class="btn btn-primary rounded d-flex align-items-center admin-add-items">Add
                            Course</button>
                    </a>
                </div>
                @endif
            </div>
        </div>

        @push('scripts')

        <script>
            $(".nav-link:eq(2)").addClass('active');
        </script>

        @endpush

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

            document.getElementsByClassName("admin-table-links").addEventListener("click", function(){
                '{{ session()->put("red", url()->current()) }}';
            });

        </script>

        @endpush

        @endsection