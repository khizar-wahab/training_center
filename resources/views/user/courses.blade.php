@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-5">
        <a class="btn btn-primary" href="{{ route('user.dashboard') }}">الذهاب إلى لوحة القيادة</a>
        <a class="btn btn-primary" href="{{ route('user.barcode') }}">مشاهدة ملف Qrcode</a>
    </div>
    <form action="{{ route('user.courses.enroll.multiple') }}" method="post" id="enrollMultipleForm" class="mb-4">
        @csrf
        <button type="submit" id="enrollSelected" class="btn btn-primary">التسجيل في الدورات المختارة</button>
    </form>
    @if ($message = session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('courses')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        You did not select any course
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        @forelse ($courses as $course)
        @php
            $enrolled = $course->users()->where('user_id', auth()->id())->first();
        @endphp
        <div class="course-wrap col-12 col-sm-2 col-md-3 col-lg-4 mb-4">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-body">
                    @if ($enrolled)
                        <input type="checkbox" checked readonly>
                    @else
                        <input type="checkbox" class="select-course" name="courses[]" value="{{ $course->id }}" form="enrollMultipleForm">
                    @endif
                    <h3 class="card-title">{{ $course->title }}</h3>
                    <p class="card-text"><b>Training Provider: </b>{{ $course->traiPro }}</p>
                    @if ($enrolled)
                        <button class="btn btn-primary" disabled>Enrolled</button>
                    @else
                        <button class="btn btn-primary enroll-course-btn" data-enroll-route="{{ route('user.courses.enroll', $course->id) }}" data-course-id="{{ $course->id }}">Enroll</button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <h3 class="text-center">No courses found!</h3>
        </div>
        @endforelse
    </div>
</div>

<script>
    const enrollBtns = document.querySelectorAll('.enroll-course-btn');
    enrollBtns.forEach((btn) => {
        btn.addEventListener('click', event => enrollCourse(event))
    });

    function enrollCourse(event) {
        let enrollRoute = event.target.dataset.enrollRoute;
        $.ajax({
            url: enrollRoute,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function () {
                event.target.textContent = 'Enrolling...';
            },
            success: function (res) {
                if (res.status) {
                    event.target.textContent = 'Enrolled';
                    event.target.disabled = true;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: res.message,
                    })
                    event.target.textContent = 'Enrolled';
                    event.target.disabled = true;
                }
            }
        })
    }
</script>
@endsection