<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index');
    }
}