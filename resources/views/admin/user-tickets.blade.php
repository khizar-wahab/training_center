@extends('admin.layouts.app')

@push('title')
Admin Users | {{ $user->name }} Tickets
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
                    <h5 class="card-title">{{$user->name}}'s tickets</h5>

                  <!-- Default Table -->
                  <table class="table table-responsive-md">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Course Training Provider</th>
                        <th scope="col">Enroll Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($user->tickets as $i => $ticket)
                           
                       <tr>
                        <th>{{ $i + 1 }}</th>
                        <td><a href="{{ route('adminCourse.edit', $ticket->course->id) }}">{{$ticket->course->title }}</a></td>
                        <td>{{ $ticket->course->traiPro }}</td>
                        <td>{{ \Illuminate\Support\carbon::parse($ticket->created_at)->format('M d Y') }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle rounded" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
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
                        <td class="text-center" colspan="5">No tickets found</td>
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
{{-- <a href="{{ route('adminCourse.create') }}"><button class="btn btn-primary">Add Course</button></a> --}}