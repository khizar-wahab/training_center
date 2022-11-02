<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('user.courses', compact('courses'));
    }
}
