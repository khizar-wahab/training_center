<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\Ticket;
use App\Models\Barcode;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\CourseEnrolled;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        
        return view('user.courses', compact('courses'));
    }

    public function enroll(Course $course, Request $request)
    {
        $user = Auth::guard('web')->user();

        $enrolled = UserCourse::where('user_id', $user->id)
                              ->where('course_id', $course->id)
                              ->first();
        if ($enrolled) {
            return ['status' => false, 'message' => 'You have already enrolled in this course'];
        }

        $enrolled = UserCourse::create([
            'user_id' => $user->id,
            'course_id' => $course->id
        ]);

        $qrcode = '3' . time();

        // Create Ticket
        $ticket = Ticket::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'qrcode_number' => $qrcode,
        ]);

        Barcode::create([
            'number' => $qrcode,
            'type' => 2,
            'user_id' => $ticket->id
        ]);

        $tickets = [];
        $tickets[] = $ticket;
        Mail::to(Auth::user())->send(new CourseEnrolled($tickets));

        return ['status' => true, 'message' => 'You have successfully enrolled the course'];
    }

    public function enrollMultiple(Request $request)
    {
        $user = Auth::guard('web')->user();

        $request->validate([
            'courses' => 'required|array|min:1'
        ]);

        $tickets = [];
        foreach ($request->courses as $id) {
            $course = Course::find($id);
            
            $enrolled = UserCourse::where('user_id', $user->id)
                                  ->where('course_id', $id)
                                  ->first();
            if ($enrolled) {
                continue;
            }

            UserCourse::create([
                'user_id' => $user->id,
                'course_id' => $id
            ]);

            $qrcode = '3' . time();

            // Create Ticket
            $ticket = Ticket::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'qrcode_number' => $qrcode,
            ]);

            $tickets[] = $ticket;

            Barcode::create([
                'number' => $qrcode,
                'type' => 2,
                'user_id' => $ticket->id
            ]);
        }

        Mail::to(Auth::user())->send(new CourseEnrolled($tickets));

        return back()->with('success', 'Successfully enrolled in selected courses');
    }
}
