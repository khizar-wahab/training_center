<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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
        $admin = Admin::where('email', $request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back()->with(session()->flash('error', 'Invalid credentials!'));
            }
        }else{
            return redirect()->back()->with(session()->flash('error', 'Invalid credentials!'));
        }
    }
}
