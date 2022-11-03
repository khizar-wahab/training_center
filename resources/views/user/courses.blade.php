@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        @forelse ($courses as $course)
        <div class="course-wrap col-12 col-sm-2 col-md-3 col-lg-4 mb-4">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->title }}</h3>
                    <p class="card-text"><b>Training Provider: </b>{{ $course->traiPro }}</p>
                    <button class="btn btn-primary enroll-course-btn" data-enroll-route="{{ route('user.courses.enroll', $course->id) }}" data-course-id="{{ $course->id }}">Enroll</button>
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
            beforeSend: function () {
                event.target.textContent = 'Enrolling...';
            },
            success: function (res) {
                event.target.textContent = 'Enrolled';
                event.target.disabled = true;
            }
        })
    }
</script>
@endsection