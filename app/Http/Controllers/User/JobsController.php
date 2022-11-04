<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //list all jobs
    public function index()
    {
        $company = auth()->user()->company()->first() ?? false;
        $jobs = Job::all();
        return view('company.job.index', ['company'=> $company, 'jobs' => $jobs]);
    }

    //create job form
    public function create()
    {
        return view('company.job.create');
    }

    //edit job form
    public function edit(Job $job)
    {
        return view('company.job.edit', ['job'=> $job]);
    }

    //store job information
    public function store(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:254',
            'description' => 'nullable|string',
            'type' => 'nullable|string',
            'last_date' => 'nullable|date',
            'status' => ''
        ]);
        $job->fill($request->except('_token'));
        $job->save();

        return redirect()->route('company.job.index')->with('success','Job added.');
    }

    //update job information
    public function update(Job $job, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:254',
            'description' => 'nullable|string',
            'type' => 'nullable|string',
            'last_date' => 'nullable|date',
            'status' => ''
            ]);
            $job->fill($request->except('_token'));
            $job->update();

        return redirect()->route('company.job.index')->with('success','Job updated.');
    }

}
