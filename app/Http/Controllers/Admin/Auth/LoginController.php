<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $admin = Admin::where('email', $request->email)->first();
            Auth::guard('admin')->login($admin);
            session()->put('admin_password', $request->password);
            return redirect('/admin/dashboard');
        }else{
            return redirect()->back()->with(session()->flash('error', 'Invalid credentials!'));
        }
    }
}
