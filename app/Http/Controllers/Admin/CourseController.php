<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search != ""){
            $courses = Course::where('title', "LIKE", "%$request->search%")->paginate(10);
        }else{
            $courses = Course::paginate(10);
        }
        return view("admin.course", compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
        ]);

        if($request->hasFile('img')){
            $img_path = time().rand(123, 987).rand(1000, 9000).'-course.'.$request->img->extension();
            $request->img->move(public_path('/assets/images/course'), $img_path);
        }else{
            $img_path = "";
        }
        
        $course = Course::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'desc' => $request->description,
            'img_path' => $img_path,
        ]);

        if($course){
            return redirect()->back()->with(session()->flash('alert', 'Course added'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.edit_course', compact('course', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
        ]);

        $course = Course::find($id);

        if($course){
            $course->update([
                'title' => $request->title,
                'desc' => $request->description,
            ]);
            return redirect()->back()->with(session()->flash('alert', 'Course updated'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if($course){
            $course->delete();
            return redirect()->back()->with(session()->flash('alert', 'Course deleted'));
        }else{
            return redirect()->back();
        }
    }
}
