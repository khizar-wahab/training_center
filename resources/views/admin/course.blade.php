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
    <div class="col-10">

        <div class="row">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 d-flex justify-content-end">
                @if (session()->has('alert'))
                <div class="custom-alert alert bg-success text-light mx-4 mt-2">
                    <i class="bi bi-check-circle-fill"></i>&nbsp&nbsp{{ session('alert') }}
                </div>
                @endif
            </div>
        </div>

        <div class="container bg-white px-4 pt-1 pb-3 mt-2 border">
            <h1 class="text-secondary text-center mt-2">Courses</h1>

            <div class="container">

                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="col-md-8">

                        <div class="search">
                            <i class="fa fa-search"></i>
                            <form action="" method="get">
                                <input type="text" name="search" class="form-control border" placeholder="Search...">
                                <button class="btn btn-primary">Search</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            <table class="table mt-5">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        {{-- <th scope="col">Duration</th> --}}
                        <th scope="col">Description</th>
                        <th scope="col">Members</th>
                        {{-- <th scope="col">img</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" border">
                    @foreach ($courses as $course)
                    <tr>
                        <th>{{ $course->id }}</th>
                        <td>{{ $course->title }}</td>
                        {{-- <td>{{ $course->duration }}</td> --}}
                        <td>{{ $course->desc }}</td>
                        <td>{{ $course->members }}</td>
                        {{-- <td class="view-course-img text-primary" data-img_path="{{ $course->members }}">view</td>
                        --}}
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle rounded" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('adminCourse.edit', $course->id) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('adminCourse.destroy', $course->id) }}" method="POST">
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($courses->links() !== "")
            {{ $courses->links() }}
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
    $(".nav-link:eq(2)").addClass('active');
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
{{-- <a href="{{ route('adminCourse.create') }}"><button class="btn btn-primary">Add Course</button></a> --}}