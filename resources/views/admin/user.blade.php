@extends('admin.layouts.app')

@push('title')
Admin Users
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
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 d-flex justify-content-end">
                
            </div>
            
        </div>

        <div class="container bg-white px-4 pt-1 pb-3 mt-2 border">
            <h1 class="text-secondary text-center mt-2">Users</h1>

            <table class="table mt-3">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" border">
                  @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle rounded" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('adminUser.edit', $user->id) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('adminUser.destroy', $user->id) }}" method="POST">
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
            <div class="row">
                <div class="col-6">
                    @if ($users->links() !== "")
                    {{ $users->links() }}
                </div>
                <div class="col-6 d-flex justify-content-end">

                </div>
                @endif
            </div>

    </div>
</div>

@push('scripts')

<script>
    $(".nav-link:eq(1)").addClass('active');
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