@extends('admin.layouts.app')

@push('title')
Admin Users
@endpush

@section('content')

@php
    
    use App\Models\User;
    use App\Models\Course;

@endphp

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
                    <h5 class="card-title">Tickets</h5>
    
                  <!-- Default Table -->
                  <div class="table-responsive-md">

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User</th>
                        <th scope="col">Course</th>
                        <th scope="col">Training provider</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($tickets as $ticket)
                           
                       <tr>
                        <th>{{ $ticket->id }}</th>
                        <td>

                            @php

                                $user = User::find($ticket->user_id);
                                if($user){
                                    $user_id = $user->id;
                                    $user_name = $user->name;
                                }else{
                                    $user_id = '';
                                    $user_name = '';
                                }

                            @endphp

                            <a href="{{ route('adminUser.edit', $user_id ?? '') }}" class="admin-table-links">
                                {{ $user_name ?? '' }}
                            </a>

                        </td>
                        <td>

                            @php

                                $course = Course::find($ticket->course_id);
                                if($course){
                                    $course_id = $course->id;
                                    $course_name = $course->name;
                                }else{
                                    $course_id = '';
                                    $course_name = '';
                                }

                            @endphp

                            <a href="{{ route('adminCourse.edit', $course_id) }}" class="admin-table-links">
                                {{ $course_name ?? '' }}
                            </a>

                        </td>
                        <td>

                            @php

                                $course = Course::find($ticket->course_id);

                            @endphp

                            {{ $course->traiPro ?? '' }}

                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle rounded" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                        <form action="{{ route('adminTicket.destroy', $ticket->id) }}" method="POST">
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

                    @empty

                    <tr>
                        <td class="text-center" colspan="8">No Tickets found</td>
                    </tr>

                    @endforelse
                    </tbody>
                  </table>

                </div>
                  <!-- End Default Table Example -->
                </div>
              </div>

            <div class="row">
                <div class="col-6">
                    @if ($tickets->links() !== "")
                    {{ $tickets->links() }}
                </div>
                <div class="col-6 d-flex justify-content-end">

                </div>
                @endif
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
            }, 1700);
        }

    document.getElementsByClassName("admin-table-links").addEventListener("click", function(){
        '{{ session()->put("red", url()->current()) }}';
    });

</script>

@endpush

@endsection
{{-- <a href="{{ route('adminCourse.create') }}"><button class="btn btn-primary">Add Course</button></a> --}}